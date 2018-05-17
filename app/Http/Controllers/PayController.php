<?php

namespace App\Http\Controllers;

use App\Libraries\PlaceToPay;
use App\Steps\SetBankInformationStep;
use App\Steps\SetPayStep;
use App\Steps\SetPersonStep;
use App\Steps\SetProductStep;
use App\Transaction;
use Illuminate\Http\Request;
use Smajti1\Laravel\Exceptions\StepNotFoundException;
use Smajti1\Laravel\Wizard;

class PayController extends Controller
{
    private $ptp;
    protected $wizard;

    public $steps = [
        SetProductStep::class,
        SetPayStep::class,
        SetBankInformationStep::class,
        SetPersonStep::class
    ];

    public function __construct()
    {
        $this->middleware('auth');

        $this->ptp = new PlaceToPay();
        try {
            $this->wizard = new Wizard($this->steps, $sessionKeyName = 'transaction');
        } catch (StepNotFoundException $e) {
        }
    }

    public function create($step = null)
    {
        $banks = $this->ptp->getBankList();

        try {
            if (is_null($step)) {
                $step = $this->wizard->firstOrLastProcessed();
            } else {
                $step = $this->wizard->getBySlug($step);
            }
        } catch (StepNotFoundException $e) {
            abort(404);
        }

        return view('steps.base', compact('step', 'banks'));
    }

    public function store(Request $request, $step = null)
    {
        try {
            $step = $this->wizard->getBySlug($step);
        } catch (StepNotFoundException $e) {
            abort(404);
        }

        $this->validate($request, $step->rules($request));
        $result = $step->process($request);

        if(is_object($result)){
            return $result;
        }

        return redirect()->route('pay_create', [$this->wizard->nextSlug()]);
    }

    public function show(Request $request, $reference)
    {
        $transaction = Transaction::where('reference', $reference)->firstOrFail();

        if($transaction->resolveUpdate($request))
        {

            $transactionData = $this->ptp->getTransactionInformation($transaction->transactionID);
            $transaction->fill($transactionData);
            if (! $transaction->wasChanged()) {
                $transaction->touch();
            }
            $transaction->save();
        }

        return view('transaction', compact('transaction'));
    }



}

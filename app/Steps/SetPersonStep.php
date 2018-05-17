<?php

namespace App\Steps;

use App\Libraries\Structures\Person;
use App\Libraries\Structures\PSETransactionRequest;
use Illuminate\Http\Request;
use Smajti1\Laravel\Step;

class SetPersonStep extends Step
{

    public static $label = 'Datos del comprador y pagador';
    public static $slug = 'set-person';
    public static $view = 'steps.person';

    public function process(Request $request)
    {
        $this->saveProgress($request);

        $transaction = $this->generateTransaction($request);

        dd($transaction->run());
    }

    private function generateTransaction($request)
    {
        $transaction = new PSETransactionRequest();

        $transaction->fill($this->wizard->dataGet('set-product'));
        $transaction->fill($this->wizard->dataGet('set-bank'));
        $transaction->reference = $this->generateReference();
        $transaction->returnURL= route('transaction_show', ['reference' => $transaction->reference, 'bank' => true]);
        $transaction->ipAddress = $request->ip();
        //  $transaction->bankInterface = "0";
        $transaction->userAgent = $request->userAgent();
        $transaction->payer = $this->createPerson($this->wizard->dataGet('set-person'));
        $transaction->buyer = $this->createPerson($this->wizard->dataGet('set-person'));
        $transaction->shipping = $this->createPerson($this->wizard->dataGet('set-person'));

        return $transaction;
    }

    public function createPerson($data)
    {
        $person = new Person();
        $person = $person->fill($data);

        return $person;
    }

    public function generateReference()
    {
        return str_random(32);
    }

}
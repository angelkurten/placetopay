<?php

namespace App\Steps;

use App\Libraries\PlaceToPay;
use App\Libraries\Structures\Person;
use App\Libraries\Structures\PSETransactionRequest;
use App\Libraries\Structures\PSETransactionResponse;
use App\Transaction;
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

        $transactionResponse = new PSETransactionResponse($transaction->run());

        if ($transactionResponse->returnCode == 'SUCCESS') {
            $this->createDBTransaction($transaction, $transactionResponse, $request->user());

            return redirect($transactionResponse->bankURL);
        }
    }

    private function generateTransaction($request)
    {
        $transaction = new PSETransactionRequest();

        $transaction->fill($this->wizard->dataGet('set-product'));
        $transaction->fill($this->wizard->dataGet('set-bank'));
        $transaction->reference = $this->generateReference();
        $transaction->returnURL= route('transaction_show', ['reference' => $transaction->reference, 'bank' => true]);
        $transaction->ipAddress = $request->ip();
        $transaction->bankInterface = "0";
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

    private function createDBTransaction(PSETransactionRequest $pseTransaction, PSETransactionResponse $transactionResponse, $user)
    {
        $transaction = new Transaction();
        $transaction->fill($transactionResponse->toArray());
        $transaction->fill($pseTransaction->toArray());

        $transaction->user()->associate($user);

        $transaction->save();
    }

}
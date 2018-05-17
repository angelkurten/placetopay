<?php

namespace App\Libraries;


use App\Libraries\Structures\PSETransactionRequest;

trait CreateTransaction
{

    public function createTransaction(PSETransactionRequest $transaction)
    {
        try {
            $response = $this->soapClient->createTransaction([
                'auth' => $this->auth(),
                'transaction' =>  [$transaction]
            ]);
        } catch (\Exception $e) {
            dd($e->getTrace());
        }

        $response = $response->createTransactionResult;

        return (array) $response;
    }

}
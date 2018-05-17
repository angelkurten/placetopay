<?php

namespace App\Libraries;


use App\Libraries\Structures\PSETransactionRequest;

trait CreateTransaction
{

    public function createTransaction(PSETransactionRequest $transaction)
    {
        $response = $this->soapClient->createTransaction([
            'auth' => $this->auth(),
            'transaction' =>  $transaction
        ]);

        $response = $response->createTransactionResult;

        return (array) $response;
    }

}
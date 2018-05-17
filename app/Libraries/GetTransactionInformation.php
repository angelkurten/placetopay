<?php

namespace App\Libraries;


trait GetTransactionInformation
{
    public function getTransactionInformation($id)
    {

        $response = $this->soapClient->getTransactionInformation([
            'auth' => $this->auth(),
            'transactionID' =>  $id
        ]);

        $response = $response->getTransactionInformationResult;

        return (array) $response;
    }
}
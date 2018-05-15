<?php

namespace App\Libraries;


class PlaceToPay
{

    private $wsdl = null;
    private $key = null;

    public function __construct() {

        $this->wsdl = 'https://test.placetopay.com/soap/pse/?wsdl';
        $this->key = '024h1IlD';
    }

    public function bankList() {
        $client = new \SoapClient($this->wsdl, array("trace" => 1));

        try {
            $banks = $client->getBankList(array('auth'  => $this->auth()));

        } catch (\Exception $ex) {
            dd($ex);
            $banks = array();
        }
        return $banks;
    }


    private function auth() {
        $seed = date('c');
        $hash = sha1($seed . $this->key, false);
        $credentials = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $hash,
            'seed' => $seed
        );
        return $credentials;
    }


}
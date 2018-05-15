<?php

namespace App\Libraries;


use Illuminate\Filesystem\Cache;

class PlaceToPay
{

    private static $WSDL = 'https://test.placetopay.com/soap/pse/?wsdl';
    private static $ENCODING = 'UTF-8';
    private $key = null;
    private $soapClient;

    public function __construct() {

        $this->soapClient = new \SoapClient(self::$WSDL, array('trace' => 1));
    }

    public function getBankList()
    {
            try {
                $result = $this->soapClient->getBankList($this->auth());
                $banks = $result->getBankListResult->item;

            } catch (\Exception $e) {
                dd($e);
            }
        return is_array($banks) ? $banks : false;
    }

    private function auth() {
        $seed = date('c');
        $hash = sha1($seed . $this->key, false);
        $credentials = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $hash,
            'seed' => $seed
        );


        return (object) $credentials;
    }


}
<?php

namespace App\Libraries;


use App\Libraries\Structures\Authentication;


class PlaceToPay
{

    use GetBanks;
    use CreateTransaction;

    private static $WSDL = 'https://test.placetopay.com/soap/pse/?wsdl';
    private static $LOCATION = 'https://test.placetopay.com/soap/pse';
    private $key = '024h1IlD';
    private $soapClient;

    public function __construct() {
        $this->soapClient = new \SoapClient(self::$WSDL, array('trace' => 1, 'location'  => self::$LOCATION));
    }

    private function auth() {
        $auth = new Authentication('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
        return $auth->credentials();
    }

}
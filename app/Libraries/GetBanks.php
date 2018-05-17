<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
/*
 * Trait with function for get banks in the webservice
 */
trait GetBanks
{

    public function getBankList()
    {
        $banks = Cache::get('banks');
        if(is_null($banks))
        {
            try {
                $result = $this->soapClient->getBankList(['auth'=>$this->auth()]);
                $banks = $result->getBankListResult->item;
                Cache::put('banks', $banks, 1440);
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
        return is_array($banks) ? $banks : false;
    }
}
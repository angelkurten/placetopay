<?php

namespace App\Http\Controllers;

use App\Libraries\PlaceToPay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function home()
    {
        $ptp = new PlaceToPay();
        return $ptp->bankList();
    }
}

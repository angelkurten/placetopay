<?php

namespace App\Steps;

use Illuminate\Http\Request;
use Smajti1\Laravel\Step;

class SetPayStep extends Step
{

    public static $label = 'Metodo de pago';
    public static $slug = 'set-pay';
    public static $view = 'steps.pay';

    public function process(Request $request)
    {
        $this->saveProgress($request);
    }


}
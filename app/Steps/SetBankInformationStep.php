<?php

namespace App\Steps;

use Illuminate\Http\Request;
use Smajti1\Laravel\Step;

class SetBankInformationStep extends Step
{

    public static $label = 'Informacion Bancaria';
    public static $slug = 'set-bank';
    public static $view = 'steps.bank';

    public function process(Request $request)
    {
        $this->saveProgress($request);
    }

}
<?php

namespace App\Steps;

use Illuminate\Http\Request;
use Smajti1\Laravel\Step;

class SetProductStep extends Step
{

    public static $label = 'Informacion del Producto';
    public static $slug = 'set-product';
    public static $view = 'steps.product';

    public function process(Request $request)
    {
        $this->saveProgress($request);
    }

}
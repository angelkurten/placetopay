<?php

namespace App\Libraries\Structures;

use Illuminate\Database\Eloquent\Model;


class PSETransactionResponse extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * Is set empty so that all attributes can be mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
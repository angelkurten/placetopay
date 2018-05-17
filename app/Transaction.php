<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'reference', 'transactionID', 'sessionID', 'trazabilityCode', 'responseCode', 'responseReasonText', 'transactionState'
    ];

    /**
     * User owner transaction
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resolveUpdate(Request $request){
        if ($request->has('bank')) {
            return true;
        }

        if ($this->transactionState == 'PENDING' || is_null($this->transactionState)) {
            if (Carbon::now()->diffInMinutes($this->created_at) >= 7) {
                return true;
            }
        }

        return false;
    }
}

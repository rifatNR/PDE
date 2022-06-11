<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    protected $fillable = [
        'invoice_id', 'date', 'amount', 'method', 'acount', 'note',
    ];

    public function user()
    {
        return $this->belongsTo('App\Invoice');
    }
}

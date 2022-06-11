<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceOrder extends Model
{
    protected $fillable = [
        'invoice_id', 'order_id', 'title', 'description', 'quantity', 'price', 'amount',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }

    public function placeorder()
    {
        return $this->belongsTo('App\placeorder');
    }
}

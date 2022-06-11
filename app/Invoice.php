<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'invoice_number', 'invoice_date', 'due_date', 'due_amount', 'total_amount', 'currency', 'status', 'note', 'gift',
    ];

    public function invoiceOrder()
    {
        return $this->hasMany('App\InvoiceOrder');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->hasOne('App\InvoicePayment');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Placeorder extends Model
{
    protected $fillable = [
        'starting_date', 'ending_date', 'status',
    ];
    //
    protected $casts = [
        'services' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function placeorderimages()
    {
        return $this->hasMany('App\Model\PlaceOrderImage');
    }

    public function invoiceOrder()
    {
        return $this->hasOne('App\InvoiceOrder');
    }
}

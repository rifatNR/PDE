<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlaceOrderImage extends Model
{
    //
    public function placeorder()
    {
        return $this->belongsTo('App\Model\Placeorder');
    }
}

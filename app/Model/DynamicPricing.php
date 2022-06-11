<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicPricing extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Model\DynamicService');
    }
}

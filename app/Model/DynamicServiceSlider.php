<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicServiceSlider extends Model
{
    public function service_slider()
    {
        return $this->belongsTo('App\Model\DynamicService');
    }
}

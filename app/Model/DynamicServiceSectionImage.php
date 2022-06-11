<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicServiceSectionImage extends Model
{
    public function service_section()
    {
        return $this->belongsTo('App\Model\DynamicServiceSection');
    }

    public function dynamic_service()
    {
        return $this->belongsTo('App\Model\DynamicService');
    }
}

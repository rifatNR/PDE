<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicServiceSection extends Model
{
    public function service_section_image()
    {
        return $this->hasOne('App\Model\DynamicServiceSectionImage', 'service_section_id');
    }

    public function dynamic_service()
    {
        return $this->belongsTo('App\Model\DynamicService');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicService extends Model
{
    public function slider()
    {
        return $this->hasOne('App\Model\DynamicServiceSlider','service_id');
    }

    public function sections()
    {
        return $this->hasMany('App\Model\DynamicServiceSection', 'service_id');
    }

    public function section_images()
    {
        return $this->hasMany('App\Model\DynamicServiceSectionImage', 'service_id');
    }

    public function portfolioImages()
    {
        return $this->hasMany('App\Model\DynamicPortfolio', 'service_id');
    }

    public function pricing()
    {
        return $this->hasOne('App\Model\DynamicPricing','service_id');
    }
}

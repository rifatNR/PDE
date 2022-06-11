<?php

namespace App;

use User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = 
    [
        'user_id', 'company_name', 'mobile_numb', 'country_name', 'address', 'state', 'zip_code', 'city', 'pro_image'
    ];


    public function profile()
    {
        return $this->belongsTO(User::class);
    }
}

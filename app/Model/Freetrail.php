<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Freetrail extends Model
{
    //
    protected $casts = [
        'services' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

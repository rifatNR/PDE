<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Questocat\Referral\Traits\UserReferral;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, UserReferral;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'referrer_id', 'referral_token', 'phone', 'country', 'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['referral_link'];

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('index', ['ref' => $this->referral_token]);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\UserVerifyNotification(auth()->user()));  //pass the currently logged in user to the notification class
    }

    public function placeorder()
    {
        return $this->hasMany('App\Model\Placeorder');
    }
    public function freeorder()
    {
        return $this->hasMany('App\Model\Freetrail');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    //reference relation
    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }
}

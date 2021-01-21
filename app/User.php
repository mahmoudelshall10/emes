<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'first_name',
		'last_name',
        'date_of_birth'	,
        'profile_image',
		'company_name',
        'nationality'	,
        'provider', 
        'provider_id', 
		'country_of_residence',
		'mobile_number'	,
		'phone_number',
		'position',
        'account_status',
        'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activation_token'
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends Authenticatable
{
    use Notifiable;

    protected $guard = 'hotels';
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

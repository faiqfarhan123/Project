<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ['id'];
    
    public function GetEventOrganizer() {
        return $this->hasOne('\App\EventOrganizer', 'user_id', 'id');
    }

    public function GetTicketBuyer() {
        return $this->hasOne('\App\TicketBuyer', 'user_id', 'id');
    }
}

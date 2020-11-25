<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','address','created_at'
    ];
}

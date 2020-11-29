<?php

namespace App;

class Client extends User
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'created_at',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

class Client extends User
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'address', 'created_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

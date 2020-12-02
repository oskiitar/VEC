<?php

namespace App;

class Client extends User
{
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'created_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

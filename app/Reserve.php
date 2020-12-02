<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'reserve_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reserve_date'
    ];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function invoice(){
        return $this->hasOne('App\Invoice', 'reserve_id');
    }

    public function pay(){
        return $this->hasOne('App\Pay', 'reserve_id');
    }

    public function renting(){
        return $this->belongsToMany('App\Renting', 'renting_reserve', 'reserve_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    public $timestamps = false;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pay_date', 'total'
    ];

    public function reserve(){
        return $this->hasMany('App\Reserve', 'pay_id');
    }

    public function payway(){
        return $this->belongsTo('App\Payway');
    }
}

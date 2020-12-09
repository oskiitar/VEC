<?php

/**
 * @description Modelo de metodo de pago VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 23.11.2020
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payway extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function pay(){
        return $this->hasMany('App\Pay', 'payway_id');
    }
}

<?php

/**
 * @description Modelo de alquiler VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 23.11.2020
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renting extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start', 'end'
    ];

    public function reserve(){
        return $this->belongsToMany('App\Reserve', 'renting_reserve', 'renting_id');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }
}

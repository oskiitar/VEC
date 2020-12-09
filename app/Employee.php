<?php

/**
 * @description Modelo de empleado VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 03.11.2020
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contract_start','contract_end'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

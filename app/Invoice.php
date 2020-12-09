<?php

/**
 * @description Modelo de factura VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 23.11.2020
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subtotal', 'iva', 'total'
    ];

    public function reserve(){
        return $this->belongsTo('App\Reserve');
    }
}

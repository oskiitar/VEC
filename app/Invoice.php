<?php

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

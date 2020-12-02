<?php

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
        return $this->belongsTo('App\Pay');
    }
}

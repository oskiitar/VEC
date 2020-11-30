<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','contract_start','contract_end'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

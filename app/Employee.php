<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','contract_start','contract_end'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

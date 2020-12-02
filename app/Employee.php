<?php

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

<?php

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
        return $this->hasMany('App\Room', 'room_id');
    }
}

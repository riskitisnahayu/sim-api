<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regencies';
    public $timestamps = true;

    public function province()
    {
        return $this->belongsTo('App\Province', 'provinces_id', 'id');
    }

    public function district()
    {
        return $this->hasMany('App\District', 'regencies_id', 'id');
    }
}

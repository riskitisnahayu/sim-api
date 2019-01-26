<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['id', 'user_id', 'jenis_kelamin', 'class', 'school_name', 'orangtua_id', 'province_id', 'regency_id', 'district_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

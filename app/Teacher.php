<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name','created_at','updated_at');
    //


    public function teacher()
    {
        return $this->hasMany('App\Student');
    }

   
}
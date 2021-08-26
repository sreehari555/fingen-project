<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name','age','gender','teacher','created_at','updated_at');
    //




    public function mark()
    {
        return $this->hasMany('App\Mark');
    }

   
}
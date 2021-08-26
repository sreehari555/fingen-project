<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name','created_at','updated_at');
    //




   
}
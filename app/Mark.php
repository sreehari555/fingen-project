<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('maths','science','history','term_id','student_id','created_at','updated_at');
    //




    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
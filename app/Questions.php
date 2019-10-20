<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $primaryKey = 'q_id';
    public function exam(){
        return $this->belongsTo('App\Exams');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $primaryKey = 'e_id';
    public function questions(){
        return $this->hasMAny('App\Questions');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    public function modulo(){
        return $this->belongsTo('App\Modulo');
    }
}

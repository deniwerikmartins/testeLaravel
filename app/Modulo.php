<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        "titulo",
        "descricao",
        "data_de_cadastro",
        "data_de_alteracao",
        "status"
    ];

    public function modulo(){
        return $this->belongsTo('App\Modulo');
    }
}

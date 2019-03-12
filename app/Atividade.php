<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "id_do_modulo",
        "titulo",
        "descricao",
        "data_de_cadastro",
        "data_de_alteracao",
        "status"
    ];

    public function modulo(){
        return $this->belongsTo('App\Modulo')->withPivot('titulo');
    }

    public function atividade(){
        return $this->belongsTo("App\Atividade");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtividadeRequest;
use App\Atividade;
use App\Modulo;
use DateTime;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $atividades = DB::table('atividades')
            ->join('modulos','atividades.id_do_modulo', '=', 'modulos.id')
            ->select('atividades.*', 'modulos.titulo as titulo_do_modulo')
            ->get();


        //$atividades = Atividade::all();

        return view("atividades.index", compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::lists('titulo','id')->all();

        return view("atividades.cadastro", compact('modulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadeRequest $request)
    {

        $atividade = $request->all();

        if (isset($atividade["status"])){
            $atividade["status"] = 1;
        }

        Atividade::create($atividade);

        return redirect('atividades/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atividade = Atividade::findOrFail($id);

        $modulos = Modulo::all();

        return view("atividades.editar", compact('atividade', 'modulos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtividadeRequest $request, $id)
    {
        $dados = $request->all();

        $atividade = Atividade::findOrFail($id);

        $alteracao = new DateTime("NOW");
        $alteracao = $alteracao->format("Y-m-d H:i:s");

        if (isset($dados["status"])){
            $dados["status"] = 1;
        }

        $dados["data_de_alteracao"] = $alteracao;

        $atividade->update($dados);

        return redirect("atividades/");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            Atividade::findOrFail($id)->delete();
        } catch (Exception $exception){
            die("Erro");
        }

        return redirect("/atividades");

    }

}

<?php

namespace App\Http\Controllers;

use \App\Http\Requests\ModuloRequest;
use App\Modulo;
use DateTime;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::all();

        return view('modulos.index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Modulo::create($request->all());

        return redirect("modulos/");
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
        $modulo = Modulo::findOrFail($id);

        return view('modulos.editar', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloRequest $request, $id)
    {
        //var_dump($id);
        $dados = $request->all();

        $modulo = Modulo::findOrFail($id);

        $alteracao = new DateTime("NOW");
        $alteracao = $alteracao->format("Y-m-d H:i:s");

        if (isset($dados["status"])){
            $dados["status"] = 1;
        }

        $dados["data_de_alteracao"] = $alteracao;

        $modulo->update($dados);

        return redirect("modulos/");
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
            Modulo::findOrFail($id)->delete();
        } catch (Exception $exception){
            die("Não é possivel remover um módulo que contenha atividades associadas");
        }


        return redirect("/modulos");
    }
}

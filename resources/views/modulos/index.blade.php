@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Módulos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="/modulos/create">
                <button type="button" class="btn btn-primary">Cadastrar módulo</button>
            </a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de cadastro</th>
                    <th scope="col">Data de alteração</th>
                    <th scope="col">Status</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>

                </tr>
                </thead>
                <tbody>

                @if ($modulos)

                    @foreach ($modulos as $modulo)


                        <tr>
                            <th scope="row">{{$modulo->id}}</th>
                            <td>{{$modulo->titulo}}</td>
                            <td>{{$modulo->descricao}}</td>
                            <td>{{$modulo->data_de_cadastro}}</td>
                            <td>{{$modulo->data_de_alteracao}}</td>
                            <td>

                                @if ($modulo->status == 1)
                                    {{'Ativado'}}
                                    @else
                                        {{'Desativado'}}
                                @endif

                            </td>

                            <td>
                                <a href="/modulos/{{$modulo->id}}/edit/">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </td>
                            <td>

                                {!! Form::open(['method' => 'DELETE', 'action' => ['ModuloController@destroy', $modulo->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Deletar', ['class' => 'btn-danger']) !!}
                                    </div>

                                {!! Form::close() !!}


                            </td>
                        </tr>

                    @endforeach

                @endif

                </tbody>
            </table>
        </div>
    </div></div>

@stop
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Atividades</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <a href="/atividades/create">
            <button type="button" class="btn btn-primary">Cadastrar atividade</button>
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
                <th scope="col">Módulo</th>
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

            @if ($atividades)
                @foreach ($atividades as $atividade)

                    <tr>
                        <th scope="row">{{$atividade->id}}</th>
                        <td>{{$atividade->titulo_do_modulo}}</td>
                        <td>{{$atividade->titulo}}</td>
                        <td>{{$atividade->descricao}}</td>
                        <td>{{$atividade->data_de_cadastro}}</td>
                        <td>{{$atividade->data_de_alteracao}}</td>
                        <td>

                            @if ($atividade->status == 1)
                                {{"Ativado"}}
                                @else
                                    {{"Desativado"}}
                            @endif


                        </td>

                        <td>
                            <a href="/atividades/{{$atividade->id}}/edit">
                                <i class="fas fa-edit"></i>
                            </a>

                        </td>
                        <td>

                            {!! Form::open(['method' => 'DELETE', 'action' => ['AtividadeController@destroy', $atividade->id]]) !!}

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
</div>

@stop
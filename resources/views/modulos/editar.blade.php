@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Editar módulo</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/modulos/{{$modulo->id}}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="texto" name="titulo" aria-describedby="tituloHelp" placeholder="" required value="{{$modulo->titulo}}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="3" name="descricao" required>{{$modulo->descricao}}</textarea>
                </div>

                <span>Status</span>
                <div class="form-group form-check">

                    @if ($modulo->status == 1)
                        {!! '<input type="checkbox" class="form-check-input" id="status" name="status" checked>' !!}

                        @else
                            {!! '<input type="checkbox" class="form-check-input" id="status" name="status">' !!}
                    @endif


                    <label class="form-check-label" for="status">Ativo</label>
                </div>

                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>

    @include('includes.form_error')


@stop
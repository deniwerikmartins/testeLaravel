@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Cadastrar atividade</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="/atividades">

                <div class="from-group">
                    <label for="modulo">Módulo</label>
                    <select class="custom-select" name="id_do_modulo" id="id_do_modulo" required>

                        @if ($modulos)
                            @foreach ($modulos as $key => $value)
                                <option value="{{$key}}">
                                    {{$value}}
                                </option>
                            @endforeach

                        @endif

                    </select>
                </div>



                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="texto" name="titulo" aria-describedby="tituloHelp" placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="3" name="descricao" required></textarea>
                </div>

                <span>Status</span>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status">
                    <label class="form-check-label" for="exampleCheck1">Ativo</label>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

    @include('includes.form_error')



@stop




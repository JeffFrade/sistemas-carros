@extends('adminlte::page')

@section('title', 'Editar Cor')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Cor {{ $color->color }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => ['dashboard.colors.update', ['id' => $color->id]], 'method' => 'PUT']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Editar Cor</h3>
                </div>

                <div class="card-body">
                    @include('color._form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('dashboard.colors.index') }}" class="btn btn-danger btn-overlay"><i class="fa fa-times"></i>&nbsp; Cancelar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-save"></i>&nbsp; Salvar</button>
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

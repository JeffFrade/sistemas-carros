@extends('adminlte::page')

@section('title', 'Cadastrar Marca')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastrar Marca</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.brands.store', 'method' => 'POST']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Marca</h3>
                </div>

                <div class="card-body">
                    @include('brand._form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('dashboard.brands.index') }}" class="btn btn-danger btn-overlay"><i class="fa fa-times"></i>&nbsp; Cancelar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-save"></i>&nbsp; Salvar</button>
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

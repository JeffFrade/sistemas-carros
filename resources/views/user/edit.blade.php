@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuário {{ $user->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => ['dashboard.users.update', ['id' => $user->id]], 'method' => 'PUT']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Editar Usuário</h3>
                </div>

                <div class="card-body">
                    @include('user._form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-danger btn-overlay"><i class="fa fa-times"></i>&nbsp; Cancelar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-save"></i>&nbsp; Salvar</button>
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

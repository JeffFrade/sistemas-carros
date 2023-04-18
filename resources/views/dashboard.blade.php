@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalColorsIndex }}</h3>
                    <p>Cores</p>
                </div>

                <div class="icon">
                    <i class="fa fa-palette"></i>
                </div>

                <a href="{{ route('dashboard.colors.index') }}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-3">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalBrandsIndex }}</h3>
                    <p>Marcas</p>
                </div>

                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>

                <a href="{{ route('dashboard.brands.index') }}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

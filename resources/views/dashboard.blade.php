@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row margin-bottom">
        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalColorsIndex }}</h3>
                    <p>Cores</p>
                </div>

                <div class="icon">
                    <i class="fa fa-palette"></i>
                </div>

                <a href="{{ route('dashboard.colors.index') }}" class="small-box-footer">Mais Informações &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalBrandsIndex }}</h3>
                    <p>Marcas</p>
                </div>

                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>

                <a href="{{ route('dashboard.brands.index') }}" class="small-box-footer">Mais Informações &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalCarsIndex }}</h3>
                    <p>Carros</p>
                </div>

                <div class="icon">
                    <i class="fa fa-car"></i>
                </div>

                <a href="{{ route('dashboard.cars.index') }}" class="small-box-footer">Mais Informações &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Usuários</p>
                </div>

                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

                <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">Mais Informações &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row margin-bottom">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Carros na Vitrine</span>
                    <span class="info-box-number">{{ $totalShowcaseCars }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Valor Total dos Carros</span>
                    <span class="info-box-number">R$ {{ \StringHelper::formatCurrency($totalValue) }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Valor Médio dos Carros</span>
                    <span class="info-box-number">R$ {{ \StringHelper::formatCurrency($avgPrice) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-transparent bg-primary">
                    <h3 class="card-title"><i class="fa fa-dollar-sign"></i>&nbsp; Top 10 Carros Mais Caros</h3>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Cor</th>
                                <th>Ano</th>
                                <th>Preço</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($cars as $car)
                                <tr>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->brand->brand }}</td>
                                    <td>{{ $car->color->color }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>R$ {{ \StringHelper::formatCurrency($car->price) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Não há dados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style type="text/css">
        .margin-bottom {
            margin-bottom: 12px;
        }
    </style>
@stop

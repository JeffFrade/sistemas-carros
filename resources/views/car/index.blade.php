@extends('adminlte::page')

@section('title', 'Carros')

@section('content_header')
    <h1 class="m-0 text-dark">Carros</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.cars.index', 'method' => 'GET']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="text" id="model" name="model" class="form-control" placeholder="Modelo" value="{{ $params['model'] ?? '' }}">
                        </div>

                        <div class="col-sm-2">
                            <select id="id_brand" name="id_brand" class="form-control">
                                <option value="" selected="">Nehuma Marca</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ ($params['id_brand'] ?? '') == $brand->id ? 'selected="selected"' : '' }}>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <select id="id_color" name="id_color" class="form-control">
                                <option value="" selected="">Nehuma Cor</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ ($params['id_color'] ?? '') == $color->id ? 'selected="selected"' : '' }}>{{ $color->color }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <input type="number" id="year" name="year" class="form-control" step="1" min="0" placeholder="Ano" value="{{ $params['year'] ?? '' }}">
                        </div>

                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-search"></i>&nbsp; Filtrar</button>
                            &nbsp;
                            <a href="{{ route('dashboard.cars.create') }}" class="btn btn-default text-dark"><i class="fa fa-plus"></i>&nbsp; Cadastrar Carro</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Cor</th>
                                <th>Ano</th>
                                <th>Preço</th>
                                <th>Vitrine</th>
                                <th>Ações</th>
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
                                    <td>
                                        @if ($car->showcase === true)
                                            <div class="badge badge-success label">Sim</div>
                                        @else
                                            <div class="badge badge-danger label">Não</div>
                                        @endif
                                    </td>
                                    <td style="width: 1%" nowrap="">
                                        <a href="#" class="btn btn-primary btn-xs {{ empty($car->image ?? '') ? 'disabled' : '' }}" title="Visualizar Foto"><i class="fa fa-image"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-overlay" data-id="{{ $car->id }}" title="Excluir" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Não há dados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {!! PaginateHelper::paginateWithParams($cars, $params) !!}
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>

        @include('util.delete-modal')
    </div>
@stop

@section('js')
    <script src="{{ asset('js/delete-modal.js') }}"></script>
    <script type="text/javascript">
        deleteModal('colors/delete/');
    </script>
@stop

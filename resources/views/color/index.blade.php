@extends('adminlte::page')

@section('title', 'Cores')

@section('content_header')
    <h1 class="m-0 text-dark">Cores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">

                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($colors as $c)
                                <tr>
                                    <td>{{ $c->color }}</td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="#" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs" title="Excluir"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@stop

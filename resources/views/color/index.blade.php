@extends('adminlte::page')

@section('title', 'Cores')

@section('content_header')
    <h1 class="m-0 text-dark">Cores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.colors.index', 'method' => 'GET']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" id="color" name="color" class="form-control" placeholder="Cor" value="{{ $params['color'] ?? '' }}">
                        </div>

                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-search"></i>&nbsp; Filtrar</button>
                            &nbsp;
                            <a href="{{ route('dashboard.colors.create') }}" class="btn btn-default text-dark"><i class="fa fa-plus"></i>&nbsp; Cadastrar Cor</a>
                        </div>
                    </div>
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
                            @forelse($colors as $color)
                                <tr>
                                    <td>{{ $color->color }}</td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="#" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-del" data-id="{{ $color->id }}" title="Excluir"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Não há dados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {!! PaginateHelper::paginateWithParams($colors, $params) !!}
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript">
        $('.btn-del').on('click', function (e) {
            e.preventDefault();
            $('.overlay').removeClass('overlay-hidden');
            $.ajax({
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'DELETE',
                url: 'colors/delete/' + $(this).data('id'),
                timeout: 0,
                success: function (response) {
                    $.notify({message: response.message}, {type: 'success'});
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (err) {
                    let error = err.responseJSON.error;
                    $.notify({message: error.message}, {type: 'danger'});
                    console.error(error);
                    $('.overlay').addClass('overlay-hidden');
                }
            });
        });
    </script>
@stop

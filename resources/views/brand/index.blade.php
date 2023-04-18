@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1 class="m-0 text-dark">Marcas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.brands.index', 'method' => 'GET']) }}
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" id="brand" name="brand" class="form-control" placeholder="Marca" value="{{ $params['brand'] ?? '' }}">
                        </div>

                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-overlay"><i class="fa fa-search"></i>&nbsp; Filtrar</button>
                            &nbsp;
                            <a href="{{ route('dashboard.brands.create') }}" class="btn btn-default text-dark"><i class="fa fa-plus"></i>&nbsp; Cadastrar Marca</a>
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
                            @forelse($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand }}</td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="{{ route('dashboard.brands.edit', ['id' => $brand->id]) }}" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-overlay" data-id="{{ $brand->id }}" title="Excluir" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
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
                    {!! PaginateHelper::paginateWithParams($brands, $params) !!}
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>

        @include('util.delete-modal')
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('#deleteModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            modal.find('.id-del').val(id);
        });

        $('#deleteModal').on('hide.bs.modal', function (event) {
            $('.overlay').addClass('overlay-hidden');
        });

        $('.btn-del').on('click', function (e) {
            e.preventDefault();

            $('#deleteModal').hide();

            $.ajax({
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'DELETE',
                url: 'brands/delete/' + $('.id-del').val(),
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
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        });
    </script>
@stop

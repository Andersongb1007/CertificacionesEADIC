@extends('layouts.app')

@section('content_header')
<h1>Certificados</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- DATATABLE EXAMPLE -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Listado Certificados') }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped dt-responsive nowrap">
                <thead>
                    <tr class="text-center">
                        <th >Alumno</th>
                        <th>Master</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->oportunidades_nombre_contacto }}</td>
                        <td>{{ Str::limit($user->nombre_producto, 20, '...') }}</td>
                        <td>{{ $user->oportunidades_situacion_financiera }}</td>
                        @if (($user->oportunidades_situacion_financiera == '3.2.COMPLETADO') || ($user->oportunidades_situacion_financiera == '3.1.COMPLETADO'))
                        <td>
                            <form action="{{ route('certificado.descarga') }}" method="POST" rol="form" id="descarga-pdf">
                                @csrf
                                <input type="hidden" class="form-element" id="id" name="id"
                                    value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary">
                                    Decargar
                                </button>
                            </form>
                        </td>
                        @else
                            <td>
                                <a href="#" class="btn btn-secondary" disabled>Descargar</a>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

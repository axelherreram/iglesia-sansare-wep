@extends('layouts.app')

@section('style')
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<style>
    .card {
        max-width: 800px;
        margin: 0 auto;
    }
    .btn-primary-ig-r {
        background-color: #007bff;
        border-color: #007bff;
    }
    h3, h6 {
        color: #333;
    }
    .page-content {
        padding-top: 20px;
    }
    .table {
        background-color: white;
        border-radius: 10px;
    }
    .btn-primary-ig-r:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <a href="{{ route('bautizos.index') }}" class="btn btn-sm btn-primary-ig-r">
                    <i class="lni lni-arrow-left"></i> Regresar
                </a>
                <h3 class="mt-3">Detalles del Bautizo</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Partida No:</th>
                                <td>{{ $bautizo->NoPartida }}</td>
                            </tr>
                            <tr>
                                <th>Folio:</th>
                                <td>{{ $bautizo->folio }}</td>
                            </tr>
                            <tr>
                                <th>Persona Bautizada:</th>
                                <td>{{ $bautizo->nombre_persona_bautizada }}</td>
                            </tr>
                            <tr>
                                <th>Sacerdote:</th>
                                <td>{{ $bautizo->nombre_sacerdote }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Bautizo:</th>
                                <td>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('d M Y') }}</td>
                            </tr>
                            <!-- Agrega más campos según lo que necesites mostrar -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

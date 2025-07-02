@extends('admin.dashboard')
@push('styles')

@endpush
@section('banner')
@endsection
@section('content')
<div class="container mt-4">
    <h2>Visualización de Documentos de Usuarios</h2>

    <table class="table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>Número de Documento</th>
                <th>Nombre Completo</th>
                <th>Cargo</th>
                <th>Nombre del Archivo</th>
                <th>Fecha Emisión</th>
                <th>Tipo</th>
                <th>Fecha Expiración</th>
                <th>Días Vencidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
                @php
                    $diasVencidos = null;
                    if ($documento->fecha_vencimiento) {
                        $diasVencidos = \Carbon\Carbon::parse($documento->fecha_vencimiento)
                                        ->startOfDay()
                                        ->diffInDays(now()->startOfDay(), false);
                    }
                @endphp
                <tr>
                    <td>{{ $documento->usuario->doc_usuario }}</td>
                    <td>{{ $documento->usuario->pri_nombre }} {{ $documento->usuario->seg_nombre }} {{ $documento->usuario->pri_apellido }} {{ $documento->usuario->seg_apellido}}</td>
                    <td>{{ $documento->usuario->cargos->cargo }}</td>
                    <td>{{ basename($documento->nom_documento) }}</td>
                    <td>{{ \Carbon\Carbon::parse($documento->created_at)->format('Y-m-d') }}</td>
                    <td>{{ $documento->tipoDocumento->nom_tip_document }}</td>
                    <td>{{ $documento->fecha_vencimiento ?? '---' }}</td>

                    <td>
                        @if($diasVencidos !== null)
                            @if($diasVencidos < 0)
                                Al día
                            @else
                                {{ $diasVencidos }}
                            @endif
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        <a href="{{ asset('storage/' . $documento->ruta_archivo) }}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

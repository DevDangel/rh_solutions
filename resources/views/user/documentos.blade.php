@extends('user.dashboard')
@push('styles')

@endpush
@section('banner')
@endsection
@section('content')
<div class="container">
    <h2 class="mb-4">Mis Documentos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Buscador -->
    <div class="mb-4">
        <input type="text" id="buscador" class="form-control" placeholder="Buscar por nombre, tipo o estado...">
    </div>

    <table class="table table-bordered table-hover" id="tablaDocumentos">
        <thead>
            <tr>
                <th>Estatus</th>
                <th>Nombre Documento</th>
                <th>Fecha Emisión</th>
                <th>Tipo</th>
                <th>Fecha Expiración</th>
                <th>Días Vencidos</th>
                <th>Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentosRequeridos as $documento)
                @php
                    $subido = $documentosSubidos->firstWhere('id_tip_document', $documento->id_tip_document);
                    $diasVencidos = null;
                    if ($subido && $subido->fecha_vencimiento) {
                        $diasVencidos = \Carbon\Carbon::parse($subido->fecha_vencimiento)->startOfDay()->diffInDays(now()->startOfDay(), false);
                    }
                @endphp
                <tr>
                    <td>
                        @if($subido)
                            <span class="badge bg-success">Subido</span>
                        @else
                            <span class="badge bg-danger">Pendiente</span>
                        @endif
                    </td>
                    <td>{{ $documento->nom_documento }}</td>
                    <td>{{ $subido ? \Carbon\Carbon::parse($subido->created_at)->format('Y-m-d') : '---' }}</td>
                    <td>{{ $documento->tipoDocumento->nom_tip_document }}</td>
                    <td>{{ $subido ? ($subido->fecha_vencimiento ?? '---') : '---' }}</td>
                    <td> @if($diasVencidos < 0)
                        Al día
                        @else
                        {{ $diasVencidos }}
                        @endif</td>
                    <td>
                        @if($subido)
                            <a href="{{ asset('storage/' . $subido->ruta_archivo) }}" target="_blank" class="btn btn-success btn-sm">Ver</a>
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        @if(!$subido)
                            <!-- Botón para abrir modal subir -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSubir{{ $documento->id_tip_document }}">Subir</button>
                        @else
                            @if($documento->obligatorio == 1)
                                <!-- Botón para abrir modal editar -->
                                <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $subido->id_documentos }}">Editar</button>
                            @endif

                            <!-- Botón eliminar -->
                            <form action="{{ route('usuario.documentos.eliminar', $subido->id_documentos) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('¿Deseas eliminar este documento?')">Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>

                <!-- Modal SUBIR -->
                <div class="modal fade" id="modalSubir{{ $documento->id_tip_document }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('usuario.documentos.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_tip_document" value="{{ $documento->id_tip_document }}">
                                <input type="hidden" name="nom_documento" value="{{ $documento->nom_documento }}">

                                <div class="modal-header">
                                    <h5 class="modal-title">Subir Documento: {{ $documento->nom_documento }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Archivo:</label>
                                        <input type="file" name="archivo" class="form-control" required
                                            accept="@if($documento->id_tip_document == 1) application/pdf
                                                    @elseif($documento->id_tip_document == 2) .doc,.docx
                                                    @elseif($documento->id_tip_document == 3) .xls,.xlsx
                                                    @endif">
                                    </div>

                                    @if($documento->obligatorio == 1)
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de Expiración:</label>
                                            <input type="date" name="fecha_vencimiento" class="form-control" required>
                                        </div>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Subir Documento</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if($subido && $documento->obligatorio == 1)
                <!-- Modal EDITAR -->
                <!-- Modal de Editar -->
<div class="modal fade" id="modalEditar{{ $subido->id_documentos }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('usuario.documentos.actualizarFecha', $subido->id_documentos) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Editar Fecha de Expiración: {{ $subido->nom_documento }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Fecha de Expiración</label>
                        <input type="date" name="fecha_vencimiento" class="form-control" value="{{ $subido->fecha_vencimiento }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

                @endif

            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('buscador').addEventListener('keyup', function() {
        let filtro = this.value.toLowerCase();
        let filas = document.querySelectorAll('#tablaDocumentos tbody tr');

        filas.forEach(fila => {
            let textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });
</script>
@endsection

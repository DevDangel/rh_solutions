@extends('admin.dashboard')

@section('tite', 'Asignación de Documentos')
@push('styles')

@endpush
@section('banner')
@endsection
@section('content')

<div class="container mt-4">
    <h1>Asignación de Documentos</h1>

    <!-- Botón para abrir el modal -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
        Asignar Documento
    </button>

    <!-- Modal para registrar documento -->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Asignar Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form id="formCrearDocumento" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Cargo -->
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo</label>
                            <select class="form-control" id="cargo" name="id_cargo" required>
                                <option value="">Seleccione</option>
                                @foreach($cargos as $cargo)
                                <option value="{{ $cargo->id_cargo }}">{{ $cargo->cargo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Tipo de Documento -->
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-control" id="tipo_documento" name="id_tip_document" required>
                                <option value="">Seleccione</option>
                                @foreach($tiposDocumentos as $tipo)
                                <option value="{{ $tipo->id_tip_document }}">{{ $tipo->nom_tip_document }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nombre del Documento -->
                        <div class="mb-3">
                            <label for="nom_documento" class="form-label">Nombre del Documento</label>
                            <input type="text" class="form-control" id="nom_documento" name="nom_documento" required>
                        </div>

                        <!-- Checkbox de Fecha de Expiración -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="requiere_fecha" name="requiere_fecha">
                            <label class="form-check-label" for="requiere_fecha">¿Requiere Fecha de Expiración?</label>
                        </div>

                        <button type="submit" class="btn btn-primary"> Asignar Documento </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Documentos Asignados -->
    <div class="mt-4">
        <table class="table datatable" id="tablaDocumentos">

            <thead>
                <tr>

                    <th>Documento</th>
                    <th>Cargo</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbodyDocumentos">
                @foreach($documentosAsignados as $documento)
                <tr>
                    <td>{{ $documento->nom_documento }}</td>
                    <td>{{ $documento->cargo->cargo }}</td>
                    <td>{{ $documento->tipoDocumento->nom_tip_document }}</td>
                    <td>
                        <form action="{{ route('admin.eliminar.documento', $documento->id_doc_requerido) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este documento?')">Eliminar</button>
                        </form>

                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $documento->id_doc_requerido }}">Editar</button>


                    </td>
                </tr>

                <div class="modal fade" id="modalEditar{{ $documento->id_doc_requerido }}" tabindex="-1" aria-labelledby="modalLabel{{ $documento->id_doc_requerido }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.actualizar.documento', $documento->id_doc_requerido) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $documento->id_doc_requerido }}">Editar Documento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nom_documento" class="form-label">Nombre del Documento</label>
                                        <input type="text" class="form-control" name="nom_documento" value="{{ $documento->nom_documento }}" required>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" name="requiere_fecha" {{ $documento->obligatorio ? 'checked' : '' }}>
                                    <label class="form-check-label">¿Requiere Fecha de Expiración?</label>
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    </div>


@endsection

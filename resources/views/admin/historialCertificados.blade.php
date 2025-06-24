@extends('admin.dashboard')

@section('title', 'Solicitudes')
@section('content')
@section('banner')
@endsection

<div class="container  table-custom">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="list-usuario">Historial Certificados</h6>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-light mt-3" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre colaborador</th>
                                <th>Nombre del contrato</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Finalización</th>
                                <th>Motivo Solictud</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($certificados as $certificado)
                            <tr>
                                <td>{{ $certificado->contrato->usuario->doc_usuario }}</td>
                                <td>{{ $certificado->contrato->usuario->pri_nombre }} {{ $certificado->contrato->usuario->pri_apellido }}</td>
                                <td>{{ $certificado->contrato->tipoContrato->nom_contrato ?? 'Sin tipo' }}</td>
                                <td>{{ $certificado->contrato->fec_ingreso->format('d/m/Y') }}</td>
                                <td>{{ $certificado->contrato->fec_finalizacion ? $certificado->contrato->fec_finalizacion->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    <button class="btn btn-custom btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalVer"
                                            data-motivo="{{ $certificado->motivo }}">Ver</button>
                                </td>
                                <td>
                                    <a href="{{ route('admin.verCertificado', $certificado->id_contrato) }}" class="btn btn-sm btn-generar"
                                        target="_blank">
                                        <i class="fas fa-file-pdf"></i> Ver en PDF
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- MODAL PARA VER MOTIVO -->
<div class="modal fade" id="modalVer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header custom-header text-white">
                <h5 class="modal-title">Motivo de solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <textarea id="motivoSolicitud" cols="100" rows="10" readonly></textarea>
                <div class="modal-footer mt-3">
                    <button type="submit" class="btn btn-custom btn" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#dataTable', {
            responsive: true,
            autoWidth: false,
            language: {
                lengthMenu: "Mostrar _MENU_ registros",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                info: "Página _PAGE_ de _PAGES_",
                search: "Buscar:",
                zeroRecords: "No se encontraron registros",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });
    </script>
    <script>
        $('#modalVer').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var motivo = button.data('motivo');

            $('#motivoSolicitud').val(motivo);
        });
    </script>
@endpush
@endsection

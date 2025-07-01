@extends('admin.dashboard')
@section('title', 'Contratos')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/contratos.css')}}">
    <link rel="stylesheet" href="{{asset('css/solicitud.css')}}">
@endpush
@section('content')
@section('banner')
@endsection
{{--MENSAJE DE EXITO AL CREAR Y ERRO--}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" style="position: absolute;z-index:100000">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="container">
    <h1>Historial Contratos</h1>
        <div>
            <!-- Botón para abrir el Modal de Crear -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearContrato">
                Crear Contrato
            </button>
        </div>

    <!-- Tabla de Contratos -->
    <div class="table-responsive">
        <table class="table table-bordered table-light mt-3" id="dataTable" width="100%">

            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Tipo de contrato</th>
                    <th>Tiempo</th>
                    <th>Fecha inicio</th>
                    <th>Fecha finalización</th>
                    <th>Salario</th>
                    <th>Estado contrato</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratos as $contrato)
                <tr>
                    <td>{{ $contrato->id_contrato }}</td>
                    <td>{{ $contrato->usuario->doc_usuario }}</td>
                    <td>{{ $contrato->usuario->pri_nombre }} {{ $contrato->usuario->seg_nombre }} {{ $contrato->usuario->pri_apellido }} {{ $contrato->usuario->seg_apellido}}</td>
                    <td>{{$contrato->estadoContrato->nom_est_contrato}}</td>
                    <td>{{ $contrato->tipoContrato->nom_contrato }}</td>
                    <td>{{ $contrato->tiempoContrato->nom_tiemp_contrato }}</td>
                    <td>{{ $contrato->fec_ingreso->format('d/m/Y') }}</td>
                    <td>{{ $contrato->fec_finalizacion ? $contrato->fec_finalizacion->format('d/m/Y') : 'N/A' }}</td>
                    <td>${{ number_format($contrato->salario, 2, ',', '.') }}</td>
                    <td>{{ $contrato->estadoContrato->nom_est_contrato }}</td>
                    <td>
                        <!-- Botón para generar certificado -->
                        <!-- Botón Editar -->
                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditarContrato"
                                data-id="{{ $contrato->id_contrato }}">
                            Editar
                        </button>
                        <!-- Botón Eliminar -->
                       {{-- <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminarContrato"
                                data-id="{{ $contrato->id_contrato }}">
                            Eliminar
                        </button> ESTE ES PARA TENER EN CUENTA ---}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL PARA CREAR CONTRATO -->
<div class="modal fade" id="modalCrearContrato" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header custom-header text-white">
                <h5 class="modal-title">Crear Nuevo Contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('contrato.create')}}">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="InputNum_documen">Documento<span class="asterisco-rojo">*</span></label>
                            <input type="text" name="doc_usuario" class="form-control" required pattern="^[0-9]{7,10}$"
                                placeholder="Digite 7 a 10 dígitos" id="InputNum_documen" maxlength="10">
                            <small id="crearDocumentoError" class="mensaje-error text-danger" style="display: none;"></small>
                        </div>
                        {{---NUEVOS INPUTS TRAER NOMBRE COMPLETO DE LA BD SEGUN EL DOCUMENTO---}}
                        <div class="col-md-6">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre_completo" class="form-control bg-light" readonly id="nombre">
                        </div>
                        {{---NUEVOS INPUTS TRAER APELLIDO COMPLETO DE LA BD SEGUN EL DOCUMENTO---}}
                        <div class="col-md-6">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" name="apellido_completo" class="form-control bg-light" readonly id="apellido">
                        </div>
                        <div class="col-md-6">
                            <label for="InputTipo_contrato" class="form-label" style="color: black">Tipo de contrato
                                <span class="asterisco-rojo">*</span>
                            </label>
                            <select class="form-control" name="id_tip_contrato" id="InputTipo_contrato" required>
                                <option value="" disabled selected>Seleccione</option>
                                @foreach ($tiposContrato as $tipo)
                                    <option value="{{$tipo->id_tip_contrato}}">{{$tipo->nom_contrato}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="InputnumMes_contrato" class="form-label" style="color: black">Tiempo del contrato
                                <span class="asterisco-rojo">*</span>
                            </label>
                            <select class="form-control" name="id_tiempo_cont" id="InputnumMes_contrato" required>
                                <option value="" disabled selected>Seleccione</option>
                                @foreach ($tiemposContrato as $t)
                                    <option value="{{$t->id_tiemp_contrato}}">{{$t->nom_tiemp_contrato}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha_ingreso" style="color: black" class="form-label">Fecha de ingreso
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <input type="date" class="form-control" name="fec_inicio" required
                                    value="" id="fecha_ingreso">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha_finalizacion" style="color: black" class="form-label">Fecha de finalización</label>
                                <input type="date" class="form-control" name="fec_final" value="" id="fecha_finalizacion">
                                <small id="fechaError" class="mensaje-error text-danger" style="display: none;"></small>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="InputSalario" style="color: black" class="form-label">Salario
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <input type="text" class="form-control" name="salario" id="InputSalario" required
                                    pattern="^[0-9]{6,8}$" placeholder="Digite 6 a 8 dígitos"
                                    value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="InputEst_contrato" class="form-label" style="color: black">Estado de contrato
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <select class="form-control" name="id_estado_cont" id="InputEst_contrato" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach ($estadoContrato as $estado)
                                        <option value="{{$estado->id_est_contrato}}">{{$estado->nom_est_contrato}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-mb-3">
                            <div class="mb-3">
                                <label for="InputCondiciones" class="form-label" style="color: black">Funciones</label>
                                <textarea class="form-control" name="funciones" id="InputFunciones" rows="5"
                                    placeholder="Ingrese las condiciones aquí"></textarea>
                            </div>
                        </div>
                        <div class="col-mb-3">
                            <div class="mb-3">
                                <label for="InputClausulas" class="form-label" style="color: black">Clausulas</label>
                                <textarea class="form-control" name="clausulas" id="InputClausulas" rows="5"
                                    placeholder="Ingrese las condiciones aquí"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 b-flex justify-content-start">
                        <button type="submit" class="btn btn-custom btn" name="btncrearcontrato" value="1" id="btnCrear">Crear contrato</button>
                        <button type="button" class="btn btn-custom btn" data-bs-dismiss="modal" onclick="resetForm()">Cancelar edición</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL PARA EDITAR CONTRATO -->
<div class="modal fade" id="modalEditarContrato" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header custom-header text-white">
                <h5 class="modal-title">Editar Contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('contrato.update', ['id' => 'ID_DEL_CONTRATO']) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="editInputNum_documen">Documento<span class="asterisco-rojo">*</span></label>
                            <input type="text" name="doc_usuario" class="form-control" required pattern="^[0-9]{7,10}$"
                                placeholder="Digite 7 a 10 dígitos" id="editInputNum_documen" maxlength="10">
                            <small id="editDocumentoError" class="mensaje-error text-danger" style="display: none;"></small>
                        </div>
                        {{---NUEVOS INPUTS TRAER NOMBRE COMPLETO DE LA BD SEGUN EL DOCUMENTO---}}
                        <div class="col-md-6">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre_completo" class="form-control bg-light" readonly id="edit_nombre">
                        </div>
                        {{---NUEVOS INPUTS TRAER APELLIDO COMPLETO DE LA BD SEGUN EL DOCUMENTO---}}
                        <div class="col-md-6">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" name="apellido_completo" class="form-control bg-light" readonly id="edit_apellido">
                        </div>
                        <div class="col-md-6">
                            <label for="editInputTipo_contrato" class="form-label" style="color: black">Tipo de contrato
                                <span class="asterisco-rojo">*</span>
                            </label>
                            <select class="form-control" name="id_tip_contrato" id="editInputTipo_contrato" required>
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($tiposContrato as $tipo)
                                    <option value="{{ $tipo->id_tip_contrato }}">{{ $tipo->nom_contrato }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="editInputnumMes_contrato" class="form-label" style="color: black">Tiempo del contrato
                                <span class="asterisco-rojo">*</span>
                            </label>
                            <select class="form-control" name="id_tiempo_cont" id="editInputnumMes_contrato" required>
                                <option value="" disabled selected>Seleccione</option>
                                 @foreach($tiemposContrato as $tiempo)
                                    <option value="{{ $tiempo->id_tiemp_contrato }}">{{ $tiempo->nom_tiemp_contrato }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editInputFecha_ingreso" style="color: black" class="form-label">Fecha de ingreso
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <input type="date" class="form-control" name="fec_inicio" required
                                    value="" id="editInputFecha_ingreso">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editInputFecha_finalizacion" style="color: black" class="form-label">Fecha de finalización</label>
                                <input type="date" class="form-control" name="fec_final"
                                    value="" id="editInputFecha_finalizacion">
                                <small id="editFechaError" class="mensaje-error text-danger" style="display: none;"></small>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editInputSalario" style="color: black" class="form-label">Salario
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <input type="text" class="form-control" name="salario" id="editInputSalario" required
                                    pattern="^[0-9]{6,8}$" placeholder="Digite 6 a 8 dígitos"
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editInputEst_contrato" class="form-label" style="color: black">Estado de contrato
                                    <span class="asterisco-rojo">*</span>
                                </label>
                                <select class="form-control" name="id_estado_cont" id="editInputEst_contrato" required>
                                    <option value="">Seleccione</option>
                                     <option value="" disabled selected>Seleccione</option>
                                    @foreach($estadoContrato as $estado)
                                        <option value="{{ $estado->id_est_contrato }}">{{ $estado->nom_est_contrato }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="col-mb-3">
                            <div class="mb-3">
                                <label for="editFunciones" class="form-label" style="color: black">Funciones</label>
                                <textarea class="form-control" name="funciones" id="editFunciones" rows="5"
                                    placeholder="Ingrese las funciones aquí"></textarea>
                            </div>
                        </div>
                        <div class="col-mb-3">
                            <div class="mb-3">
                                <label for="editClausulas" class="form-label" style="color: black">Clausulas</label>
                                <textarea class="form-control" name="clausulas" id="editClausulas" rows="5"
                                    placeholder="Ingrese las clausulas aquí"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-success btn-custom" id="btnActualizar">Actualizar Contrato</button>
                        <button type="button" class="btn btn-secondary btn-custom" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL DE CONFIRMACIÓN PARA ELIMINAR CONTRATO -->
<div class="modal fade" id="modalEliminarContrato" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este contrato?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" id="formEliminarContrato">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_contrato" id="deleteContratoId">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- JavaScript bundle with popper -->

@push('scripts')
    <script src="{{ asset('js/contratos.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#tablaContratos').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                },
                responsive: true
            });

            // Modal: pasar ID al editar
            $('#modalEditarContrato').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                $('#editContratoId').val(id);

                // Aquí podrías hacer un AJAX si necesitas cargar más datos dinámicamente
            });

            // Modal: pasar ID al eliminar
            $('#modalEliminarContrato').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                $('#deleteContratoId').val(id);
            });
        });
    </script>
<script>
$('#modalEditarContrato').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let id = button.data('id');

    $.ajax({
        url: '/contrato/editar/' + id,
        type: 'GET',
        success: function (response) {
            $('#editContratoId').val(id);
            $('#editInputNum_documen').val(response.contrato.usuario.doc_usuario);
            $('#editInputTipo_contrato').val(response.contrato.id_tip_contrato);
            $('#editInputnumMes_contrato').val(response.contrato.id_tiemp_contrato);
            $('#editInputFecha_ingreso').val(response.contrato.fec_ingreso.split('T')[0]);
            $('#editInputFecha_finalizacion').val(response.contrato.fec_finalizacion ? response.contrato.fec_finalizacion.split('T')[0] : '');
            $('#editInputSalario').val(parseInt(response.contrato.salario));
            $('#editInputEst_contrato').val(response.contrato.id_est_contrato);
            $('#editFunciones').val(response.contrato.funciones);
            $('#editClausulas').val(response.contrato.clausulas);
            $('#edit_nombre').val(response.nombre_completo);
            $('#edit_apellido').val(response.apellido_completo);
            // Asegurar que el formulario apunte a la ruta correcta
            $('#modalEditarContrato form').attr('action', '/contrato/update/' + id);
        },
        error: function () {
            alert('Error al cargar los datos del contrato.');
        }
    });
});

</script>
<script>
    $('#modalEliminarContrato').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');

        // Modifica la acción del formulario con el ID dinámico
        $('#formEliminarContrato').attr('action', '/contrato/delete/' + id);
    });
</script>
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
@endpush
@endsection

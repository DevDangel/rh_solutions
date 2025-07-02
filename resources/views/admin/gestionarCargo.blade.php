@extends('admin.dashboard')
@section('title' ,'cargos')
@push('styles')
     <link rel="stylesheet" href="{{ asset('css/gestionarCargos.css') }}">
@endpush
@section('content')
@section('banner')
@endsection
<script>
        var res = function () {
            var not = confirm("¿Esta seguro que desea eliminar el Cargo?");
            return not;
        }
    </script>
    <!-- Modal Agregar Datos-->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Cargo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @if(session('Correcto'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('Correcto') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('Incorrecto'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('Incorrecto') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <form id="formCrearCargo" action="{{route('GestionarCargo.create')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="InputCargo" class="form-label" style="color: black;">
                                        Cargo<span class="asterisco-rojo">*</span>
                                    </label>
                                    <input type="text" class="form-control capitalizar-cargo" name="cargo"
                                        id="InputCargo" required value="{{ old('cargo') }}" />
                                    <div id="cargoError" class="text-danger" style="display:none;"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="InputDependencia" class="form-label" style="color: black">
                                        Dependencia <span class="asterisco-rojo">*</span>
                                    </label>
                                    <select class="form-control" name="dependencia" id="InputDependencia" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        @foreach ($dependencias as $dependencia)
                                            <option value="{{ $dependencia->id_dependencia }}" {{ old('dependencia') == $dependencia->id_dependencia ? 'selected' : '' }}>
                                                {{ $dependencia->dependencia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="list-cargo">Lista de cargos</h6>

            <!--Mensaje de eliminado con exito-->
            @if(session('Eliminado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('Eliminado') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('Sin_eliminar'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('Sin_eliminar') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Baton para crear nuevo cargo -->
            <div class="p-5 table-responsive">
                <button class="btn-crear-cargo" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Crear
                    Cargo</button>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table" id="dataTable" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">id_cargo</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Dependencia</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($cargos as $item)

                                <tr>
                                    <td>{{$item->id_cargo}}</td>
                                    <td>{{$item->cargo}}</td>
                                    <td>{{$item->dependencias?->dependencia ?? 'Sin Dependencia'}}</td>
                                    <td>
                                        <!-- Botón Editar -->
                                        <a href="" data-bs-toggle="modal" title="Editar cargo"
                                            data-bs-target="#modalEditar{{$item->id_cargo}}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                        <!-- Botón Eliminar -->
                                        <a href="{{route('GestionarCargo.delete', $item->id_cargo)}}" onclick="return res()"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"
                                                title="Eliminar cargo"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Modificar datos-->
    @foreach ($cargos as $item)
        <div class="modal fade" id="modalEditar{{$item->id_cargo}}" data-id="{{ $item->id_cargo }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cargo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="formEditar{{ $item->id_cargo }}" action="{{route('GestionarCargo.update', $item->id_cargo)}}"
                        method="post">
                        @csrf
                        <div class="modal-body">

                            <!--mensajes en la parte superior del modal editar -->
                            @php
                                $modalSesion = session('modal');
                                $modalActual = "editar_" . $item->id_cargo;
                            @endphp

                            @if($modalSesion === $modalActual)
                                @if(session("Correct"))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session("Correct") }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif

                                @if (session("Advertencia"))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session("Advertencia") }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif

                                @if(session("Incorrect"))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session("Incorrect") }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCargoEditar{{$item->id_cargo}}" class="form-label"
                                            style="color: black">
                                            Cargo <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control capitalizar-cargo" name="cargo"
                                            id="InputCargoEditar{{$item->id_cargo}}" required value="{{ $item->cargo }}" />
                                        <div id="cargoErrorEditar{{ $item->id_cargo }}" class="text-danger"
                                            style="display:none;"></div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputDependenci{{$item->id_cargo}}" class="form-label"
                                            style="color: black">
                                            Dependencia <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="id_dependencia"
                                            id="InputDependenci{{ $item->id_cargo }}" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($dependencias as $dependencia)
                                                <option value="{{ $dependencia->id_dependencia }}"
                                                    @selected($dependencia->id_dependencia == $item->id_dependencia)>
                                                    {{ $dependencia->dependencia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary"
                                    id="editarBtn{{ $item->id_cargo }}">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
<!--Para validar datos en agregar por metodo validate-->
<script>
    // Si el formulario se envió correctamente (usando sesión Laravel), cierra modal y limpia el formulario
    document.addEventListener("DOMContentLoaded", function () {
        @if (session('Correcto'))
            const modal = document.getElementById('modalRegistrar');
            const form = document.getElementById('formCrearCargo');
            if (modal && form) {
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modal);
                modalInstance.hide();
                form.reset();
            }
        @endif
});
</script>
<!--datatable-->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap4.js"></script>
<!--datatable responsive-->
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap4.js"></script>
<!--Para datatable-->
<script>
    new DataTable('#dataTable', {
        responsive: true,
        autoWidth: false,

        language: {
            lengthMenu: "Mostrar _MENU_ cargos por página",
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
            },
            aria: {
                orderable: "Ordenar por esta columna",
                orderableReverse: "Orden inverso de esta columna"
            }
        }
    });
</script>
<!--Para la validacion por ajax de modal crear y editar-->
<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.validarCampoUrl = '{{ route('validar.campo') }}';
</script>
<!-- reabre el modal registrar del cargo seleccionado y muestra el mensaje de exito-->
@if(session('modal') == 'registrar_')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('modalRegistrar'));
            modal.show();
        });
    </script>
@endif
<!-- reabre el modal editar del cargo seleccionado y muestra el mensaje de exito-->
@if(session('modal'))
    <script>
        $(document).ready(function () {
            let modalID = "{{ session('modal') }}";
            if (modalID.startsWith("editar_")) {
                let id = modalID.replace("editar_", "");
                $('#modalEditar' + id).modal('show');
            }
        });
    </script>
@endif
<script>
    function validarCargo(inputId, errorId, opciones = {}) {
        const input = document.getElementById(inputId);
        const error = document.getElementById(errorId);
        if (!input) return;
        const { original = null, bloquear = false } = opciones;
        input.removeEventListener("input", input._inputHandler);
        const handler = function () {
            const valor = input.value.trim().toLowerCase();

            if (original !== null && valor === original.toLowerCase()) {
                error.style.display = "none";
                error.textContent = "";
                input.setCustomValidity("");
                return;
            }
            clearTimeout(input._timeout);
            input._timeout = setTimeout(() => {
                fetch(window.validarCampoUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": window.csrfToken,
                    },
                    body: JSON.stringify({ campo: "cargo", valor: valor }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            error.style.display = "block";
                            error.textContent = `El cargo ya está registrado.`;
                            input.setCustomValidity(bloquear ? `El cargo ya está registrado.` : "");
                        } else {
                            error.style.display = "none";
                            error.textContent = "";
                            input.setCustomValidity("");
                        }
                    })
                    .catch(error => {
                        console.error("Error al validar cargo:", error);
                        input.setCustomValidity("");
                    });
            }, 400);
        };

        input._inputHandler = handler;
        input.addEventListener("input", handler);
    }
    document.addEventListener("DOMContentLoaded", function () {
        // Validar campo en formulario de creación
        const inputCrear = document.getElementById("InputCargo");
        if (inputCrear) {
            validarCargo("InputCargo", "cargoError", { bloquear: true });
        }
        // Validar campo en todos los modales de edición
        const modalesEditar = document.querySelectorAll('[id^="modalEditar"]');
        modalesEditar.forEach((modal) => {
            modal.addEventListener("shown.bs.modal", function () {
                const id = modal.getAttribute("data-id");
                if (!id) return;

                const inputId = `InputCargoEditar${id}`;
                const errorId = `cargoErrorEditar${id}`;
                const input = document.getElementById(inputId);
                if (input) {
                    const valorOriginal = input.value.trim();
                    validarCargo(inputId, errorId, { original: valorOriginal, bloquear: false });
                }
            });
        });
    });
</script>
<script>
    //limpiar de mensajes error modal crear cuando le doy cerrar
    document.getElementById("modalRegistrar")
        .addEventListener("hidden.bs.modal", () => {
            const modal = document.getElementById("modalRegistrar");

            // Ocultar y limpiar mensajes de error con clase text-danger dentro del modal
            modal.querySelectorAll(".text-danger").forEach((errorElem) => {
                errorElem.style.display = "none";
                errorElem.textContent = "";
            });

        });
    //limpiar de mensajes error modal editar cuando le doy cerrar
    document.querySelectorAll('[id^="modalEditar"]').forEach((modal) => {
        modal.addEventListener("hidden.bs.modal", () => {
            // Ocultar y limpiar mensajes de error dentro del modal
            modal.querySelectorAll(".text-danger").forEach((errorElem) => {
                errorElem.style.display = "none";
                errorElem.textContent = "";
            });

            // Opcional: resetear el formulario dentro del modal
            const form = modal.querySelector("form");
            if (form) form.reset();
        });
    });
</script>
<!-- Enlace a script externo -->
<script src="{{ asset('js/gestionarCargos.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@endsection

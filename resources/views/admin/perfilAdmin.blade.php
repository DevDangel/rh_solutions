@extends('admin.dashboard')
@section('title','Mi perfil')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/perfil.css')}}">
<link rel="stylesheet" href="{{asset('css/inputs.css')}}">
@endpush
@section('content')
@section('banner')
{{--escondemos la imagen---}}
@endsection
<div class="container mt-5">
    <!-- Datos del nuevo usuario -->
    <div class="form-section">
        <form action="{{route('perfilAdmin.actualizar')}}" method="POST" id="formEditarPerfil" enctype="multipart/form-data"> {{---solo los update llevan name---}}
            @csrf
            @method('PUT')
            <h2>Datos personales</h2>
            <div class="row">
                <div class="col-md-12 mb-4 text-center">
                    <label class="form-label d-block">Foto de presentación</label>
                    <div class="avatar-wrapper mx-auto">
                        <img id="previewImage"  src="{{ asset($usuario->img_perfil ?? 'imgs/default.jpg') }}" alt="Foto por defecto" class="avatar-img mb-3">
                        <label for="InputFotoPerfil" class="btn btn-outline-primary btn-upload d-none modo-edicion texto-hover">
                            <i class="fas fa-upload me-2"></i>Seleccionar foto </label>
                        <input type="file" class="d-none modo-edicion" id="InputFotoPerfil" name="foto_perfil" accept="image/*" onchange="previewPhoto(event)" style="display: none;">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo de documento</label>
                    <input type="text" class="form-control solo-lectura" id="inputTipDocumento" value="{{$usuario->tip_documento}}" readonly> {{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Número de documento</label>
                    <input type="text" class="form-control solo-lectura"  id="docUsuario" value="{{$usuario->doc_usuario}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Primer nombre </label>
                    <input type="text" class="form-control solo-lectura" id="priNombre" value="{{$usuario->pri_nombre}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control solo-lectura" id="segNombre" value="{{$usuario->seg_nombre}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Primer apellido</label>
                    <input type="text" class="form-control solo-lectura"  id="priApellido" value="{{$usuario->pri_apellido}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control solo-lectura"  id="segApellido" value="{{$usuario->seg_apellido}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control solo-lectura" id="inputFecNacimiento" value="{{ $usuario->fec_nacimiento }}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" class="form-control editable" name="correo_usuario" id="correoUsuario" value="{{$usuario->correo_usuario}}" required readonly> {{---este si se puede editar---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Celular</label>
                    <input type="text" class="form-control editable" name="cel_usuario" id="celUsuario" value="{{$usuario->cel_usuario}}" required readonly> {{---este si se puede editar---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sexo</label>
                    {{---modo lectura---}}
                    <input type="text" class="form-control campo-dual solo-lectura" id="sexoTexto" value="{{ $usuario->sex_usuario }}" readonly>
                    {{---modo edicion---}}
                    <select class="form-select d-none" name="sexo" id="sexo" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Masculino" {{ old('sexo', $usuario->sex_usuario) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ old('sexo', $usuario->sex_usuario) == 'Femenino' ? 'selected' : '' }}>Femenino</option>

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" id="">Estado civil</label>
                    {{---modo lectura---}}
                    <input type="text" class="form-control campo-dual solo-lectura" id="estadoCivilTexto" value="{{ $usuario->estado_civil }}" readonly >
                    {{---este si se puede editar---}}
                    <select class="form-select d-none" id="estadoCivil" name="estado_civil">
                        <option value="Soltero(a)" {{ old('estado_civil', $usuario->estado_civil) == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                        <option value="Casado(a)" {{ old('estado_civil', $usuario->estado_civil) == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                        <option value="Divorciado(a)" {{ old('estado_civil', $usuario->estado_civil) == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                        <option value="Viudo(a)" {{ old('estado_civil', $usuario->estado_civil) == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                        <option value="Unión libre" {{ old('estado_civil', $usuario->estado_civil) == 'Unión libre' ? 'selected' : '' }}>Unión libre</option>
                        <option value="Separado(a)" {{ old('estado_civil', $usuario->estado_civil) == 'Separado(a)' ? 'selected' : '' }}>Separado(a)</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Celular de emergencia</label>{{---este si se puede editar---}}
                    <input type="text" class="form-control editable" name="cel_emer_usuario" id="celEmerUsuario" value="{{$usuario->cel_emer_usuario}}" required readonly>
                </div>
            </div>
            <!-- Datos de residencia -->
            <h2>Datos de residencia</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Departamento de residencia</label>
                      {{---modo lectura---}}
                    <input type="text" class="form-control campo-dual solo-lectura" id="departamentoTexto" value="{{ $usuario->departamentos?->nom_departamento}}" readonly>
                    {{---modo edicion---}}
                    <!-- Departamento -->
                    <select class="form-select d-none" id="departamento" name="id_departamento" required>
                        <option value="" disabled selected>Seleccione</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id_departamento }}"
                                @selected($departamento->id_departamento == $usuario->id_departamento)>
                                {{ $departamento->nom_departamento }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Municipio de residencia</label>
                      {{---modo lectura---}}
                    <input type="text" class="form-control campo-dual solo-lectura" id="municipioTexto" value="{{ $usuario->municipio?->nom_municipio}}" readonly>
                    {{---modo edicion---}}
                    <!-- Municipio -->
                    <select class="form-select d-none" id="municipio" name="id_municipio" required>
                        <option value="" disabled selected>Seleccione</option>
                        <!-- Aquí se cargan dinámicamente -->
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dirección de residencia</label>
                    <input type="text" class="form-control editable" id="dirUsuario" name="dir_usuario" value="{{ $usuario->dir_usuario}}" readonly required>
                </div>
            </div>
            <!-- Ingreso y egreso -->
            <h2>Datos de ingreso y egreso</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profesión</label>
                    <input type="text" class="form-control solo-lectura" value="{{ $usuario->profesiones?->nom_profesion }}" readonly required>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Registro profesional</label>
                    <input type="text" class="form-control solo-lectura"  id="registroProfesional" value="{{$usuario->registro_profesional}}" required readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control solo-lectura" value="{{ $usuario->cargos?->cargo }}" readonly readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Estado de usuario</label>
                    <input type="text" class="form-control solo-lectura" value="{{ $usuario->estado?->nom_estado }}" readonly readonly>{{---edit solo lectura---}}
                </div>
            </div>
            <!-- Seguridad social -->
            <h2>Estado de seguridad social</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">EPS</label>
                    <input type="text" class="form-control solo-lectura" value="{{$usuario->eps->nom_eps}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fondo de pensión</label>
                    <input type="text" class="form-control solo-lectura" value="{{$usuario->pensiones->nom_pension}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">ARL</label>
                    <input type="text" class="form-control solo-lectura" value="{{$usuario->arl->nom_arl}}" readonly>{{---edit solo lectura---}}
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Caja de compensación</label>
                    <input type="text" class="form-control solo-lectura" value="{{$usuario->cajaCompensacion->nom_caj_compen}}" readonly>{{---edit solo lectura---}}
                    </div>
                </div>
            <!-- Botones de acción -->
            <div class="btn-container">
                <button type="button" id="btnEditarPerfil" class="btn-custom-perfil" data-modo="editar">Editar mi información</button>
                <a href="{{route('perfilAdmin')}}" class="btn btn-custom-perfil d-none modo-edicion">Cancelar Edición</a>
                <a href="{{route('admin.dashboard')}}"  class="btn btn-custom-perfil">Volver a inicio</a>
            </div>
        </form>
    </div>
</div>
<!-- Modal de resultado -->
<div class="modal fade" id="modalRespuesta" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content text-center">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100" id="modalMensaje"></h5>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{asset('js/perfil.js')}}"></script>
<script>
// script para el mensaje en el modal
document.addEventListener('DOMContentLoaded', function () {
    @if(session('estado') == 'success')
        mostrarModal('Datos actualizados correctamente');
    @elseif(session('estado') == 'error')
        mostrarModal('Error al actualizar los datos');
    @endif

    function mostrarModal(mensaje) {
        const modalTexto = document.getElementById('modalMensaje');
        modalTexto.textContent = mensaje;
        const modal = new bootstrap.Modal(document.getElementById('modalRespuesta'));
        modal.show();
    }
});
</script>
{{---toco poner la mrda de script aqui porque externo no dejo >:( ---}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const btnEditar = document.getElementById('btnEditarPerfil');
    const formulario = document.getElementById('formEditarPerfil');
    const depSelect = document.getElementById('departamento'); //  mismo ID que en Blade
    const munSelect = document.getElementById('municipio');

    function cargarMunicipios(departamentoID, municipioSeleccionado = null) {
        return new Promise((resolve, reject) => {
            munSelect.innerHTML = '<option value="" disabled selected>Seleccione</option>';

            fetch(`/municipios-admin/${departamentoID}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(municipio => {
                        const option = document.createElement('option');
                        option.value = municipio.id_municipio;
                        option.text = municipio.nom_municipio;
                        if (municipioSeleccionado && municipio.id_municipio == municipioSeleccionado) {
                            option.selected = true;
                        }
                        munSelect.appendChild(option);
                    });
                    resolve(); //  ya terminó de cargar
                })
                .catch(error => {
                    alert('Error al cargar los municipios');
                    reject(error);
                });
        });
    }

    // Reacciona cuando el usuario cambia el departamento
    depSelect.addEventListener('change', function () {
        cargarMunicipios(this.value);
    });

    btnEditar.addEventListener('click', function (e) {
        const modo = btnEditar.dataset.modo;
        if(modo === 'editar'){
            //  1. Hacer scroll hacia la parte superior
            window.scrollTo({ top: 0, behavior: 'smooth' });

            //  2. Mostrar label + input de subir foto
            document.querySelectorAll('.modo-edicion').forEach(el => {
                el.classList.remove('d-none');
            });

            // 3. Inputs NO editables → fondo gris
            document.querySelectorAll('.solo-lectura').forEach(input => {
                input.classList.add('bg-body-secondary');
                input.setAttribute('readonly', true); // por si acaso
            });

            //  4. Inputs editables → desbloquear y blanco
            document.querySelectorAll('.editable').forEach(input => {
                input.removeAttribute('readonly');
                input.classList.remove('bg-body-secondary', 'bg-light');
                input.classList.add('bg-white');
            });

            // 5. Reemplazar input de texto por sus select editables
            document.querySelectorAll('.campo-dual').forEach(input => {
                const selectID = input.getAttribute('id').replace('Texto', ''); // ej: estadoCivilText → estadoCivil
                const select = document.getElementById(selectID);
                if (select) {
                    input.classList.add('d-none');
                    select.classList.remove('d-none');
                    select.removeAttribute('disabled');
                }
            });

            btnEditar.textContent = 'Guardar información';
            btnEditar.dataset.modo = 'guardar';

            // Precarga municipios si ya hay uno
            // Precarga municipios al cargar la vista si existe uno
            const preloadedDep = depSelect?.value;
            const preloadedMun = {{ $usuario->id_municipio ?? 'null' }};

            if (preloadedDep && preloadedMun) {
                cargarMunicipios(preloadedDep, preloadedMun);
            }
        }else if(modo === 'guardar'){
            formulario.submit();
        }
    });
});
</script>
@endpush
@endsection

@extends('user.dashboard')
@section('title','Mi perfil')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/perfil.css')}}">
@endpush
@section('content')
@section('banner')
{{--escondemos la imagen---}}
@endsection
<div class="container mt-5">
    <!-- Datos del nuevo usuario -->
    <div class="form-section">
            <h2>Datos personales</h2>
            <div class="row">
                <div class="col-md-12 mb-4 text-center">
                    <label class="form-label d-block">Foto de presentación</label>
                    <div class="avatar-wrapper mx-auto">
                        <img id="previewImage" src="{{asset('imgs/default.jpg')}}" alt="Foto por defecto" class="avatar-img mb-3">
                        <label for="InputFotoPerfil" class="btn btn-outline-primary btn-upload">
                            <i class="fas fa-upload me-2"></i> Seleccionar foto
                        </label>
                        <input type="file" class="d-none" id="InputFotoPerfil" name="foto_perfil" accept="image/*" onchange="previewPhoto(event)">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo de documento</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Número de documento</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Primer nombre </label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Primer apellido</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Celular</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sexo</label>
                    <select class="form-select">
                        <option value="">Seleccione</option>
                        <option>Hombre</option>
                        <option>Mujer</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Estado civil</label>
                    <select class="form-select">
                        <option value="">Seleccione</option>
                        <option>Soltero</option>
                        <option>Casado</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Celular de emergencia</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        <!-- Datos de residencia -->
            <h2>Datos de residencia</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Departamento de residencia</label>
                    <select class="form-select">
                        <option value="">Seleccione</option>
                        <option>Ibague</option>
                        <option>Espinal</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Municipio de residencia</label>
                    <select class="form-select">
                        <option value="">Seleccione</option>
                        <option>Ibague</option>
                        <option>Espinal</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dirección de residencia</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        <!-- Ingreso y egreso -->
            <h2>Datos de ingreso y egreso</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profesión</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Registro profesional</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cargo</label>
                    <select class="form-select" required>
                        <option value="">Seleccione</option>
                        <option>Administrativo</option>
                        <option>Operario</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Estado de usuario</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        <!-- Seguridad social -->
            <h2>Estado de seguridad social</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">EPS</span></label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fondo de pensión</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">ARL</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Caja de compensación</label>
                    <input type="text" class="form-control">
                    </div>
                </div>


            <!-- Botones de acción -->
            <div class="btn-container">
                <button type="submit" class="btn btn-custom-perfil">Editar mi información</button>
                <button type="submit" class="btn btn-custom-perfil">Volver a inicio</button>
            </div>
    </div>

</div>
@push('scripts')
<script src="{{asset('js/perfil.js')}}"></script>
@endpush
@endsection

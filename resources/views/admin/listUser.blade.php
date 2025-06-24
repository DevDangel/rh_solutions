@extends('admin.dashboard')

@section('title', 'Lista de Usuarios')
@section('content')
@section('banner')
@endsection
<!-- Modal Agregar Datos-->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
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


                    <form id="formCrearUsuario" action="{{route('GestionarUsuario.create')}}" method="post">
                        @csrf

                        <!--inicio agregar-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputTip_documen" class="form-label" style="color: black;">
                                            Tipo de documento <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="tip_documento" id="InputTip_documen"
                                            required>
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="CC" {{ old('tip_documento') == 'CC' ? 'selected' : '' }}>CC
                                            </option>
                                            <option value="CE" {{ old('tip_documento') == 'CE' ? 'selected' : '' }}>CE
                                            </option>
                                            <option value="TI" {{ old('tip_documento') == 'TI' ? 'selected' : '' }}>TI
                                            </option>
                                            <option value="PA" {{ old('tip_documento') == 'PA' ? 'selected' : '' }}>PA
                                            </option>
                                            <option value="DNI" {{ old('tip_documento') == 'DNI' ? 'selected' : '' }}>DNI
                                            </option>
                                            <option value="PEP" {{ old('tip_documento') == 'PEP' ? 'selected' : '' }}>PEP
                                            </option>
                                            <option value="PPT" {{ old('tip_documento') == 'PPT' ? 'selected' : '' }}>PPT
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada # documento-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputNum_documen" style="color: black" class="form-label">
                                            Número de documento <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="num_documento"
                                            id="InputNum_documen" required pattern="^[0-9]{7,10}$"
                                            placeholder="Ingrese de 7 a 10 dígitos"
                                            value="{{ old('num_documento') }}" />
                                        <!--Muestra mensaje de validacion ajax-->
                                        <small id="crearDocumentoError" class="text-danger"
                                            style="display:none;"></small>
                                    </div>
                                </div>

                                <!--campo entrada primer nombre -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputPrim_nombre" class="form-label" style="color: black">
                                            Primer nombre <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control capitalize" name="prim_nombre"
                                            id="InputPrim_nombre" required value="{{ old('prim_nombre') }}" />
                                    </div>
                                </div>

                                <!-- campo entrada segundo nombre -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputSegun_nombre" class="form-label" style="color: black;">
                                            Segundo nombre
                                        </label>
                                        <input type="text" class="form-control capitalize" name="segun_nombre"
                                            id="InputSegun_nombre" value="{{ old('segun_nombre') }}" />
                                    </div>
                                </div>

                                <!-- campo entrada primer apellido -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputPrim_apellido" class="form-label" style="color: black;">
                                            Primer apellido <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control capitalize" name="prim_apellido"
                                            id="InputPrim_apellido" required value="{{ old('prim_apellido') }}" />
                                    </div>
                                </div>

                                <!-- campo entrada segundo apellido -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputSegun_apellido" class="form-label" style="color: black;">
                                            Segundo apellido
                                        </label>
                                        <input type="text" class="form-control capitalize" name="segun_apellido"
                                            id="InputSegun_apellido"  value="{{ old('segun_apellido') }}" />
                                    </div>
                                </div>

                                <!-- campo entrada fecha nacimiento-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputFecha_nacimien" style="color: black" class="form-label">
                                            Fecha de nacimiento<span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="date" class="form-control" name="fech_nac" id="InputFecha_nacimien"
                                            value="{{ old('fech_nac') }}" min="1950-01-01" max="2008-01-01" required />
                                    </div>
                                </div>


                                <!-- campo entrada tipo de sangre-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputSangre" class="form-label" style="color: black;">
                                            Tipo de sangre <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="tip_sangre" id="InputSangre" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="A+" {{ old('tip_sangre') == 'A+' ? 'selected' : '' }}>A+
                                            </option>
                                            <option value="A-" {{ old('tip_sangre') == 'A-' ? 'selected' : '' }}>A-
                                            </option>
                                            <option value="B+" {{ old('tip_sangre') == 'B+' ? 'selected' : '' }}>B+
                                            </option>
                                            <option value="B-" {{ old('tip_sangre') == 'B-' ? 'selected' : '' }}>B-
                                            </option>
                                            <option value="AB+" {{ old('tip_sangre') == 'AB+' ? 'selected' : '' }}>AB+
                                            </option>
                                            <option value="AB-" {{ old('tip_sangre') == 'AB-' ? 'selected' : '' }}>AB-
                                            </option>
                                            <option value="O+" {{ old('tip_sangre') == 'O+' ? 'selected' : '' }}>O+
                                            </option>
                                            <option value="O-" {{ old('tip_sangre') == 'O-' ? 'selected' : '' }}>O-
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <!-- campo entrada correo-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCorreo" style="color: black" class="form-label">
                                            Correo <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="correo" id="InputCorreo"
                                            aria-describedby="emailHelp" required value="{{ old('correo') }}" />
                                        <!--Muestra mensaje de validacion ajax para correo repetido-->
                                        <small id="crearCorreoError" class="text-danger" style="display:none;"></small>
                                        <!--Muestra mensaje de validacion ajax para correo sin dominio-->
                                        <small id="errorFormatoCorreoCrear" class="text-danger"
                                            style="display:none;"></small>
                                        <!--Muestra mensaje pra errores backend-->
                                        <small id="errorAjaxCrear" class="text-danger" style="display:none;"></small>
                                    </div>
                                </div>

                                <!-- campo entrada celular-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCelular" style="color: black" class="form-label">
                                            Celular <span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="celular" id="InputCelular"
                                            pattern="^[0-9]{10}$" placeholder="Ingrese 10 dígitos" required
                                            value="{{ old('celular') }}" />
                                        <!--Muestra mensaje de validacion ajax-->
                                        <small id="crearCelularError" class="text-danger" style="display:none;"></small>
                                    </div>
                                </div>


                                <!-- campo entrada sexo -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputSexo" class="form-label" style="color: black">Sexo<span
                                                class="asterisco-rojo">*</span></label>
                                        <select class="form-control" name="sexo" id="InputSexo" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>
                                                Masculino</option>
                                            <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>
                                                Femenino</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada estado civil -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputEst_civil" class="form-label" style="color: black">Estado
                                            civil</label>
                                        <select class="form-control" name="est_civil" id="InputEst_civil">
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="Soltero(a)" {{ old('est_civil') == 'Soltero' ? 'selected' : '' }}>Soltero(a)</option>
                                            <option value="Casado(a)" {{ old('est_civil') == 'Casado' ? 'selected' : '' }}>Casado(a)</option>
                                            <option value="Divorciado(a)" {{ old('est_civil') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                            <option value="Viudo(a)" {{ old('est_civil') == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                                            <option value="Unión libre" {{ old('est_civil') == 'Unión libre' ? 'selected' : '' }}>Unión libre</option>
                                            <option value="Separado(a)" {{ old('est_civil') == 'Separado(a)' ? 'selected' : '' }}>Separado(a)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada celular de emergencia-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCelular_emerg" style="color: black" class="form-label">
                                            Celular en caso de emergencia<span class="asterisco-rojo">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="celular_emerg"
                                            id="InputCelular_emerg" pattern="^[0-9]{10}$"
                                            placeholder="Ingrese 10 dígitos" value="{{ old('celular_emerg') }}"
                                            required />
                                    </div>
                                </div>

                                <!-- campo entrada asignar contraseña-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputContraseña" style="color: black" class="form-label">
                                            Asignar contraseña <span class="asterisco-rojo">*</span>
                                        </label>
                                        <div style="position: relative;">
                                            <input type="password" class="form-control" name="contraseña"
                                                id="InputContraseña" aria-label="Contraseña"
                                                title="Ingresa una contraseña." required>
                                            <span id="eyeIconSpan"
                                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; display: none;">
                                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                            </span>
                                        </div>
                                        <!-- Mensaje de error de validacion para contraseña -->
                                        <small id="errorFormatoContraseña" class="text-danger"
                                            style="display:none;"></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>

                        <!-- campo entrada bloque datos de residencia -->
                        <div class="container2">
                            <div class="row">
                                <!--Etiqueta-->
                                <h4>Datos de residencia</h4>

                                <!-- campo entrada Departamento de residencia -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputDepart_residen" class="form-label"
                                            style="color: black">Departamento de residencia<span class="asterisco-rojo">
                                                * </span></label>
                                        <select class="form-control" name="departamento" id="InputDepart_residen"
                                            required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id_departamento }}" {{ old('departamento') == $departamento->id_departamento ? 'selected' : '' }}>
                                                    {{ $departamento->nom_departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada Municipio de residencia -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputMunici_residen" class="form-label"
                                            style="color: black">Municipio de residencia<span class="asterisco-rojo"> *
                                            </span></label>
                                        <select class="form-control" name="munici_residen" id="InputMunici_residen"
                                            required>
                                            <option value="" disabled selected>Seleccione</option>
                                        </select>
                                    </div>
                                </div>


                                <!-- campo entrada direccion de residencia -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputDir_residen" class="form-label" style="color: black">Dirección
                                            de residencia</label>
                                        <input type="text" class="form-control capitalize" name="direccion"
                                            id="InputDir_residen" placeholder="Dirección + Barrio"
                                            value="{{ old('direccion') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5"></div>

                        <!-- campo entrada bloque datos ingreso y egreso -->
                        <div class="container3">
                            <div class="row">
                                <!--Etiqueta-->
                                <h4>Datos de ingreso y egreso</h4>

                                <!-- campo entrada profesion -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputProfesion" class="form-label" style="color: black">
                                            Profesion <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="profesion" id="InputProfesion" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($profesiones as $profesion)
                                                <option value="{{ $profesion->id_profesion }}" {{ old('profesion') == $profesion->id_profesion ? 'selected' : '' }}>
                                                    {{ $profesion->nom_profesion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada registro profesional-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputRegistro_profe" style="color: black" class="form-label">
                                            Registro profesional
                                        </label>
                                        <input type="text" class="form-control" name="registro_profesional"
                                            id="InputRegistro_profe" pattern="^[0-9]{7,10}$"
                                            placeholder="Ingrese de 7 a 10 dígitos"
                                            value="{{ old('registro_profesional') }}" disabled />
                                        <!--Mensaje via ajax-->
                                        <small id="registroProError" class="text-danger" style="display:none;"></small>
                                    </div>
                                </div>

                                <!-- campo entrada cargo -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCargo" class="form-label" style="color: black">
                                            Cargo <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="cargo" id="InputCargo" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($cargos as $cargo)
                                                <option value="{{ $cargo->id_cargo }}" {{ old('cargo') == $cargo->id_cargo ? 'selected' : '' }}>
                                                    {{ $cargo->cargo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada estado de usuario -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputEst_usuario" class="form-label" style="color: black">
                                            Estado de usuario <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="est_usuario" id="InputEst_usuario" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($EstadosUsuario as $estadoUsuario)
                                                <option value="{{ $estadoUsuario->id_estado }}" {{ old('est_usuario') == $estadoUsuario->id_estado ? 'selected' : '' }}>
                                                    {{ $estadoUsuario->nom_estado }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container4">
                            <div class="row">
                                <!--Etiqueta-->
                                <h4>Estado de seguridad social</h4>

                                <!-- campo entrada eps -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputEps" class="form-label" style="color: black">
                                            Eps <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="eps" id="InputEps" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($Eps as $eps)
                                                <option value="{{ $eps->id_eps }}" {{ old('eps') == $eps->id_eps ? 'selected' : '' }}>
                                                    {{ $eps->nom_eps }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada pension -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputPension" class="form-label" style="color: black">
                                            Fondo de pensión <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="pension" id="InputPension" required>
                                            <option value="" disabled selected>Seleccione fondo</option>
                                            @foreach ($pensiones as $pension)
                                                <option value="{{ $pension->id_pension }}" {{ old('pension') == $pension->id_pension ? 'selected' : '' }}>
                                                    {{ $pension->nom_pension }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada arl -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputArl" class="form-label" style="color: black">
                                            Arl <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="arl" id="InputArl" required>
                                            <option value="" disabled selected>Seleccione arl</option>
                                            @foreach ($Arl as $arl)
                                                <option value="{{ $arl->id_arl }}" {{ old('arl') == $arl->id_arl ? 'selected' : '' }}>
                                                    {{ $arl->nom_arl }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- campo entrada caja compensacion -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="InputCaj_compen" class="form-label" style="color: black">
                                            Caja de compensación <span class="asterisco-rojo">*</span>
                                        </label>
                                        <select class="form-control" name="caj_compen" id="InputCaj_compen" required>
                                            <option value="" disabled selected>Seleccione</option>
                                            @foreach ($cajasCompensacion as $cajaCompensacion)
                                                <option value="{{ $cajaCompensacion->id_caj_compen }}" {{ old('caj_compen') == $cajaCompensacion->id_caj_compen ? 'selected' : '' }}>
                                                    {{ $cajaCompensacion->nom_caj_compen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
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
            <h6 class="list-usuario">Listado de Usuarios</h6>

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

            <!-- Baton para crear nuevo usuario -->
            <div class="p-5 table-responsive">
                <button class="btn-crear-usuario" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Crear
                    Usuario</button>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table" id="dataTable" cellspacing="0">
                        <thead class="table-light">
                            <tr>

                                <th scope="col">Tipo de documento</th>
                                <th scope="col">Numero de documento</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Tipo de sangre</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Estado civil</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Celular de emergencia</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Profesion</th>
                                <th scope="col">Registro profesional</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Eps</th>
                                <th scope="col">Fondo de pension</th>
                                <th scope="col">Arl</th>
                                <th scope="col">Caja de compensacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($usuarios as $item)

                                <tr>

                                    <td>{{$item->tip_documento}}</td>
                                    <td>{{$item->doc_usuario}}</td>
                                    <td>{{$item->pri_nombre . ' ' . $item->seg_nombre }}</td>
                                    <td>{{$item->pri_apellido . ' ' . $item->seg_apellido}}</td>
                                    <td>{{$item->fec_nacimiento}}</td>
                                    <td>{{$item->tip_sangre}}</td>
                                    <td>{{$item->sex_usuario}}</td>
                                    <td>{{$item->estado_civil}}</td>
                                    <td>{{$item->dir_usuario}}</td>
                                    <td>{{$item->departamentos?->nom_departamento ?? 'Sin departamento'}}</td>
                                    <td>{{$item->municipio?->nom_municipio ?? 'Sin municipio'}}</td>
                                    <td>{{$item->cel_usuario}}</td>
                                    <td>{{$item->cel_emer_usuario}}</td>
                                    <td>{{$item->correo_usuario}}</td>
                                    <td>{{$item->estado->nom_estado}}</td>
                                    <td>{{$item->profesiones->nom_profesion}}</td>
                                    <td>{{$item->registro_profesional}}</td>
                                    <td>{{$item->cargos->cargo}}</td>
                                    <td>{{$item->eps->nom_eps}}</td>
                                    <td>{{$item->pensiones->nom_pension}}</td>
                                    <td>{{$item->arl->nom_arl}}</td>
                                    <td>{{$item->cajaCompensacion->nom_caj_compen}}</td>
                                    <td>

                                        <!-- Botón para ir a documentos -->
                                        <button type="button" class="btn btn-sm btn-info btn-action" title="Documentos">
                                            <i class="fas fa-file-alt"></i>
                                        </button>

                                        <!-- Botón Editar -->
                                        <a href="" data-bs-toggle="modal" title="Editar usuario"
                                            data-bs-target="#modalEditar{{$item->id_usuario}}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                        <!-- Botón Eliminar -->
                                        <a href="{{route('GestionarUsuario.delete', $item->id_usuario)}}"
                                            onclick="return res()" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash" title="Eliminar usuario"></i></a>
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
    @foreach ($usuarios as $item)
        <div class="modal fade" id="modalEditar{{$item->id_usuario}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="formEditar{{ $item->id_usuario }}"
                        action="{{route('GestionarUsuario.update', $item->id_usuario)}}" method="post">
                        @csrf
                        <div class="modal-body">

                            <!--mensajes en la parte superior del modal editar -->
                            @php
                                $modalSesion = session('modal');
                                $modalActual = "editar_" . $item->id_usuario;
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


                            <!--inicio modificar-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputTip_docume{{$item->id_usuario}}" class="form-label"
                                                style="color: black;">
                                                Tipo de documento <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="tip_documento"
                                                id="InputTip_docume{{$item->id_usuario}}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="CC" {{ $item->tip_documento == 'CC' ? 'selected' : '' }}>CC
                                                </option>
                                                <option value="CE" {{ $item->tip_documento == 'CE' ? 'selected' : '' }}>CE
                                                </option>
                                                <option value="TI" {{ $item->tip_documento == 'TI' ? 'selected' : '' }}>TI
                                                </option>
                                                <option value="PA" {{ $item->tip_documento == 'PA' ? 'selected' : '' }}>PA
                                                </option>
                                                <option value="DNI" {{ $item->tip_documento == 'DNI' ? 'selected' : '' }}>DNI
                                                </option>
                                                <option value="PEP" {{ $item->tip_documento == 'PEP' ? 'selected' : '' }}>PEP
                                                </option>
                                                <option value="PPT" {{ $item->tip_documento == 'PPT' ? 'selected' : '' }}>PPT
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada # documento-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputNum_docume{{ $item->id_usuario }}" style="color: black"
                                                class="form-label">
                                                Numero de documento <span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="num_documento"
                                                id="InputNum_docume{{ $item->id_usuario }}" required pattern="^[0-9]{7,10}$"
                                                placeholder="Ingrese de 7 a 10 dígitos" value="{{ $item->doc_usuario}}" />
                                            <!--Muestra mensaje de validacion-->
                                            <small id="numDocumentoError{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                        </div>
                                    </div>

                                    <!--campo entrada primer nombre -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputPrim_nombr{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Primer nombre <span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="text" class="form-control capitalize" name="prim_nombre"
                                                id="InputPrim_nombr{{$item->id_usuario}}" required
                                                value="{{ $item->pri_nombre }}" />
                                        </div>
                                    </div>

                                    <!-- campo entrada segundo nombre -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputSegun_nombr{{$item->id_usuario}}" class="form-label"
                                                style="color: black;">
                                                Segundo nombre
                                            </label>
                                            <input type="text" class="form-control capitalize" name="segun_nombre"
                                                id="InputSegun_nombr{{$item->id_usuario}}"
                                                value="{{ $item->seg_nombre }}" />
                                        </div>
                                    </div>

                                    <!-- campo entrada primer apellido -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputPrim_apellid{{$item->id_usuario}}" class="form-label"
                                                style="color: black;">
                                                Primer apellido <span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="text" class="form-control capitalize" name="prim_apellido"
                                                id="InputPrim_apellid{{$item->id_usuario}}" required
                                                value="{{$item->pri_apellido}}" />
                                        </div>
                                    </div>

                                    <!-- campo entrada segundo apellido -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputSegun_apellid{{$item->id_usuario}}" class="form-label"
                                                style="color: black;">
                                                Segundo apellido
                                            </label>
                                            <input type="text" class="form-control capitalize" name="segun_apellido"
                                                id="InputSegun_apellid{{$item->id_usuario}}"
                                                value="{{$item->seg_apellido}}" />
                                        </div>
                                    </div>

                                    <!-- campo entrada fecha nacimiento-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputFecha_nacimie{{$item->id_usuario}}" style="color: black"
                                                class="form-label">
                                                Fecha de nacimiento<span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="fech_nac"
                                                id="InputFecha_nacimie{{$item->id_usuario}}"
                                                value="{{$item->fec_nacimiento}}" min="1950-01-01" max="2008-01-01"
                                                required />
                                        </div>
                                    </div>

                                    <!-- campo entrada tipo de sangre-->


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputSangr{{$item->id_usuario}}" class="form-label"
                                                style="color: black;">
                                                Tipo de sangre <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="tip_sangr"
                                                id="InputSangr{{$item->id_usuario}}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="A+" {{ $item->tip_sangre == 'A+' ? 'selected' : '' }}>A+
                                                </option>
                                                <option value="A-" {{ $item->tip_sangre == 'A-' ? 'selected' : '' }}>A-
                                                </option>
                                                <option value="B+" {{ $item->tip_sangre == 'B+' ? 'selected' : '' }}>B+
                                                </option>
                                                <option value="B-" {{ $item->tip_sangre == 'B-' ? 'selected' : '' }}>B-
                                                </option>
                                                <option value="AB+" {{ $item->tip_sangre == 'AB+' ? 'selected' : '' }}>AB+
                                                </option>
                                                <option value="AB-" {{ $item->tip_sangre == 'AB-' ? 'selected' : '' }}>AB-
                                                </option>
                                                <option value="O+" {{ $item->tip_sangre == 'O+' ? 'selected' : '' }}>O+
                                                </option>
                                                <option value="O-" {{ $item->tip_sangre == 'O-' ? 'selected' : '' }}>O-
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada correo-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputCorre{{$item->id_usuario}}" style="color: black"
                                                class="form-label">
                                                Correo <span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="email" class="form-control" name="correo"
                                                id="InputCorre{{ $item->id_usuario}}" aria-describedby="emailHelp" required
                                                value="{{$item->correo_usuario}}" />
                                            <!--Muestra mensaje de validacion ajax para correo repetido-->
                                            <small id="correoError{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                            <!--Muestra mensaje de validacion ajax para correo sin dominio-->
                                            <small id="errorFormatoCorreoEditar{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                            <!--Muestra mensaje pra errores backend-->
                                            <small id="errorAjaxEditar{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                        </div>
                                    </div>

                                    <!-- campo entrada celular-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputCelula{{$item->id_usuario}}" style="color: black"
                                                class="form-label">
                                                Celular <span class="asterisco-rojo">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="celular"
                                                id="InputCelula{{ $item->id_usuario }}" pattern="^[0-9]{10}$"
                                                placeholder="Ingrese 10 dígitos" required value="{{$item->cel_usuario}}" />
                                            <!--Muestra mensaje de validacion-->
                                            <small id="celularError{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                        </div>
                                    </div>

                                    <!-- campo entrada sexo -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputSex{{$item->id_usuario}}" class="form-label"
                                                style="color: black">Sexo<span class="asterisco-rojo">*</span></label>
                                            <select class="form-control" name="sexo" id="InputSex{{$item->id_usuario}}"
                                                required>
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="Masculino" {{ $item->sex_usuario == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                <option value="Femenino" {{ $item->sex_usuario == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada estado civil -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputEst_civi{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Estado civil
                                            </label>
                                            <select class="form-control" name="est_civil"
                                                id="InputEst_civi{{$item->id_usuario}}">
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="Soltero(a)" {{ $item->estado_civil == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                                                <option value="Casado(a)" {{ $item->estado_civil == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                                                <option value="Divorciado(a)" {{ $item->estado_civil == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                                <option value="Viudo(a)" {{ $item->estado_civil == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                                                <option value="Union libre" {{ $item->estado_civil == 'Union libre' ? 'selected' : '' }}>Union libre</option>
                                                <option value="Separado(a)" {{ $item->estado_civil == 'Separado(a)' ? 'selected' : '' }}>Separado(a)</option>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada celular de emergencia-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputCelular_emer{{$item->id_usuario}}" style="color: black"
                                                class="form-label">
                                                Celular en caso de emergencia<span class="asterisco-rojo"> * </span>
                                            </label>
                                            <input type="text" class="form-control" name="celular_emerg"
                                                id="InputCelular_emer{{$item->id_usuario}}" pattern="^[0-9]{10}$"
                                                placeholder="Ingrese 10 dígitos" value="{{ $item->cel_emer_usuario }}"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- campo entrada asignar contraseña-->

                            <div class="col-md-6"></div>

                            <!-- campo entrada bloque datos de residencia -->
                            <div class="container2">
                                <div class="row">
                                    <h4>Datos de residencia</h4>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputMDepart_reside{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Departamento de residencia<span class="asterisco-rojo"> * </span>
                                            </label>
                                            <select class="form-control" name="departamento"
                                                id="InputMDepart_reside{{ $item->id_usuario }}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{$departamento->id_departamento }}"
                                                        @selected($departamento->id_departamento == $item->id_departamento)>
                                                        {{ $departamento->nom_departamento }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputMunici_reside{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Municipio de residencia<span class="asterisco-rojo"> * </span>
                                            </label>
                                            <select class="form-control" name="munici_residen"
                                                id="InputMunici_reside{{ $item->id_usuario }}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($municipios as $municipio)
                                                    <option value="{{ $municipio->id_municipio }}"
                                                        @selected($municipio->id_municipio == $item->id_municipio)>
                                                        {{ $municipio->nom_municipio }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada direccion de residencia -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputDir_reside{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Dirección de residencia
                                            </label>
                                            <input type="text" class="form-control capitalize" name="direccion"
                                                id="InputDir_reside{{$item->id_usuario}}" placeholder="Dirección + Barrio"
                                                value="{{$item->dir_usuario}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>

                            <!-- campo entrada bloque datos ingreso y egreso -->
                            <div class="container3">
                                <div class="row">
                                    <h4>Datos de ingreso y egreso</h4>

                                    <!-- campo entrada profesion -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputProfesio{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Profesion <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="profesion"
                                                id="InputProfesio{{ $item->id_usuario }}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($profesiones as $profesion)
                                                    <option value="{{ $profesion->id_profesion }}"
                                                        @selected($profesion->id_profesion == $item->id_profesion)>
                                                        {{ $profesion->nom_profesion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada registro profesional-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputRegistro_prof{{$item->id_usuario}}" style="color: black"
                                                class="form-label">
                                                Registro profesional
                                            </label>
                                            <input type="text" class="form-control" name="registro_profesional"
                                                id="InputRegistro_prof{{ $item->id_usuario }}" pattern="^[0-9]{7,10}$"
                                                placeholder="Ingrese de 7 a 10 dígitos"
                                                value="{{$item->registro_profesional}}" disabled />
                                            <!--mensaje ajax-->
                                            <small id="regisProError{{ $item->id_usuario }}" class="text-danger"
                                                style="display:none;"></small>
                                        </div>
                                    </div>

                                    <!-- campo entrada cargo -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputCarg{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Cargo <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="cargo" id="InputCarg{{$item->id_usuario}}">
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($cargos as $cargo)
                                                    <option value="{{ $cargo->id_cargo }}"
                                                        @selected($cargo->id_cargo == $item->id_cargo)>
                                                        {{ $cargo->cargo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada estado de usuario -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputEst_usuari{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Estado de usuario <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="est_usuario"
                                                id="InputEst_usuari{{$item->id_usuario}}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($EstadosUsuario as $estadoUsuario)
                                                    <option value="{{ $estadoUsuario->id_estado }}"
                                                        @selected($estadoUsuario->id_estado == $item->id_estado)>
                                                        {{ $estadoUsuario->nom_estado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container4">
                                <div class="row">
                                    <h4>Estado de seguridad social</h4>

                                    <!-- campo entrada eps -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Inputeps{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Eps <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="eps" id="Inputeps{{$item->id_usuario}}"
                                                required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($Eps as $eps)
                                                    <option value="{{ $eps->id_eps }}" @selected($eps->id_eps == $item->id_eps)>
                                                        {{ $eps->nom_eps }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada pension -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputPensio{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Fondo de pensión <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="pension"
                                                id="InputPensio{{$item->id_usuario}}" required>
                                                <option value="" disabled selected>Seleccione fondo</option>
                                                @foreach ($pensiones as $pension)
                                                    <option value="{{ $pension->id_pension }}"
                                                        @selected($pension->id_pension == $item->id_pension)>
                                                        {{ $pension->nom_pension }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada arl -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputArls{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Arl <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="arl" id="InputArls{{$item->id_usuario}}"
                                                required>
                                                <option value="" disabled selected>Seleccione arl</option>
                                                @foreach ($Arl as $arl)
                                                    <option value="{{ $arl->id_arl }}" @selected($arl->id_arl == $item->id_arl)>
                                                        {{ $arl->nom_arl }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- campo entrada caja compensacion -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InputCaj_compe{{$item->id_usuario}}" class="form-label"
                                                style="color: black">
                                                Caja de compensación <span class="asterisco-rojo">*</span>
                                            </label>
                                            <select class="form-control" name="caj_compen"
                                                id="InputCaj_compe{{$item->id_usuario}}" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($cajasCompensacion as $cajaCompensacion)
                                                    <option value="{{ $cajaCompensacion->id_caj_compen }}"
                                                        @selected($cajaCompensacion->id_caj_compen == $item->id_caj_compen)>
                                                        {{ $cajaCompensacion->nom_caj_compen }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--final update-->
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"
                                id="editarBtn{{ $item->id_usuario }}">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@push('scripts')
<script>
        var res = function () {
            var not = confirm("¿Esta seguro que desea eliminar el Usuario?");
            return not;
        }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <!--Para validar datos en agregar por metodo validate-->
<script>
    // Si el formulario se envió correctamente (usando sesión Laravel), cierra modal y limpia el formulario
    document.addEventListener("DOMContentLoaded", function () {
        @if (session('Correcto'))
            const modal = document.getElementById('modalRegistrar');
            const form = document.getElementById('formCrearUsuario');
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
            lengthMenu: "Mostrar _MENU_ usuarios por página",
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
<!-- Enlace a script externo -->
<script src="{{ asset('js/gestionarUsuarios.js') }}"></script>
<!--script para enlazar municipio con departamento en modal crear -->
<script>
    $(document).ready(function () {
        let oldDepartamento = '{{ old("departamento") }}';
        let oldMunicipio = '{{ old("munici_residen") }}';

        function cargarMunicipios(departamentoID, municipioSeleccionado = null, seleccionarMunicipio = false) {
            if (departamentoID) {
                $.ajax({
                    url: '{{ url("municipios") }}/' + departamentoID,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#InputMunici_residen').empty();
                        $('#InputMunici_residen').append('<option value="" disabled selected>Seleccione</option>');

                        $.each(data, function (key, municipio) {
                            let selected = '';
                            if (seleccionarMunicipio && municipioSeleccionado == municipio.id_municipio) {
                                selected = 'selected';
                            }

                            $('#InputMunici_residen').append(
                                '<option value="' + municipio.id_municipio + '" ' + selected + '>' +
                                municipio.nom_municipio + '</option>'
                            );
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Error AJAX:", status, error);
                        alert('Error al cargar los municipios');
                    }
                });
            } else {
                $('#InputMunici_residen').empty();
                $('#InputMunici_residen').append('<option value="" disabled selected>Seleccione</option>');
            }
        }
        // Si hay un valor antiguo (por error en validación), cargar municipios y seleccionar
        if (oldDepartamento) {
            $('#InputDepart_residen').val(oldDepartamento);
            cargarMunicipios(oldDepartamento, oldMunicipio, true); // true: selecciona municipio
        }

        // Al cambiar manualmente el departamento, cargar municipios pero NO seleccionar
        $('#InputDepart_residen').change(function () {
            const departamentoID = $(this).val();
            cargarMunicipios(departamentoID, null, false); // false: no seleccionar municipio
        });
    });
</script>
<!--script para enlazar municipio con departamento en modal editar -->
<script>
    $(document).ready(function () {
        @foreach ($usuarios as $item)
            // Función para cargar municipios y seleccionar el actual
            function cargarMunicipios{{ $item->id_usuario }}(departamentoID, municipioSeleccionado = null) {
                let municipioSelect = $('#InputMunici_reside{{ $item->id_usuario }}');
                municipioSelect.empty().append('<option value="" disabled selected>Seleccione</option>');

                if (departamentoID) {
                    $.ajax({
                        url: '{{ url("municipios") }}/' + departamentoID,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $.each(data, function (index, municipio) {
                                let selected = (municipioSeleccionado == municipio.id_municipio) ? 'selected' : '';
                                municipioSelect.append('<option value="' + municipio.id_municipio + '" ' + selected + '>' + municipio.nom_municipio + '</option>');
                            });
                        },
                        error: function () {
                            alert('Error al cargar los municipios');
                        }
                    });
                }
            }

            // Recargar municipios cuando cambie el departamento
            $('#InputMDepart_reside{{ $item->id_usuario }}').on('change', function () {
                let departamentoID = $(this).val();
                cargarMunicipios{{ $item->id_usuario }}(departamentoID);
            });

            // Al abrir el modal, cargar municipios según valores actuales
            $('#modalEditar{{ $item->id_usuario }}').on('show.bs.modal', function () {
                let departamentoID = $('#InputMDepart_reside{{ $item->id_usuario }}').val();
                let municipioSeleccionado = '{{ $item->id_municipio }}';
                cargarMunicipios{{ $item->id_usuario }}(departamentoID, municipioSeleccionado);
            });
        @endforeach
});
</script>
<!-- reabre el modal registrar del usuario seleccionado y muestra el mensaje de exito-->
@if(session('modal') == 'registrar_')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('modalRegistrar'));
            modal.show();
        });
    </script>
@endif
<!-- reabre el modal editar del usuario seleccionado y muestra el mensaje de exito-->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@endsection

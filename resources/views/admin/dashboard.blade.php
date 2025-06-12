<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Panel de Usuario - RH Solutions</title>
    {{---michels---}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Enlace a css externo -->
    <link rel="stylesheet" href="{{ asset('css/gestionarUsuario.css') }}">
    <link rel="stylesheet" href="{{asset('css/solicitud.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/contratos.css')}}">
    <!--css responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap4.css">
    <!--datatable-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>
    {{---michels---}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- FontAwesome (íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{--script slect---}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6e295b2b78.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Menú Lateral (Versión Usuario) -->
    <div class="sidebar">
        <!--boton de cerrar el  menu-->
        <button id="closeSidebar" class="btn-close-sidebar d-md-none">
            <i class="fas fa-times"></i>
        </button>

        <div class="sidebar-brand">
        </div>
        <div class="sidebar-brand">
            <img src="{{ asset('imgs/rh18.png') }}" alt="RH Solutions" width="200" height="auto">
        </div>

        <div class="sidebar-nav d-flex flex-column h-100">
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-home me-2"></i> Inicio

                    </a>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#submenuUsuarios" role="button" aria-expanded="false" aria-controls="submenuUsuarios">
                             <i class="fas fa-users me-2"></i> Gestión de Usuarios
                            </a>
                            <div class="collapse ms-5" id="submenuUsuarios">
                                <ul class="list-unstyled">
                                    <li><a class="nav-link px-0" href="{{route('crud.index')}}"><i class="fas fa-eye me-2"></i> Lista de usuarios</a></li>
                                    <li><a class="nav-link px-0" href="#"><i class="fas fa-user-plus me-2"></i> Agregar cargo</a></li>
                                </ul>
                            </div>
                        </li>


                </li>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#submenuDocumentos" role="button"
                            aria-expanded="false" aria-controls="submenuDocumentos">
                            <i class="fa-solid fa-folder-open"></i> Gestión de Documentos
                        </a>
                        <div class="collapse ms-5" id="submenuDocumentos">
                            <ul class="list-unstyled">
                                <li><a class="nav-link px-0" href="#"><i class="fas fa-file-export me-2"></i>Asignación de Documentos</a></li>
                                <li><a class="nav-link px-0" href="#"><i class="fas fa-eye me-2"></i>Visualización de Documentos</a></li>
                                <li><a class="nav-link px-0" href="#"><i class="fas fa-file-alt me-2"></i>Mis Documentos</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#submenuContratos" role="button"
                            aria-expanded="false" aria-controls="submenuContratos">
                            <i class="fa-solid fa-folder-open"></i> Contratos
                        </a>
                        <div class="collapse ms-5" id="submenuContratos">
                            <ul class="list-unstyled">
                                <li><a class="nav-link px-0" href="{{route('admin.contratos')}}"><i class="fas fa-file-export me-2"></i>Crear y ver contratos</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#submenuCertificados" role="button"
                        aria-expanded="false" aria-controls="submenuCertificados">
                        <i class="fas fa-certificate me-2"></i> Gestión de Certificados
                    </a>
                    <div class="collapse ms-5" id="submenuCertificados">
                        <ul class="list-unstyled">
                            <li><a class="nav-link px-0" href="{{route('admin.solicitud')}}"><i class="fas fa-file-signature me-2"></i> Autorizar Certificados </a>
                            </li>
                            <li><a class="nav-link px-0" href="{{route('admin.historial')}}"><i class="fas fa-check-circle me-2"></i> Historial de certificados </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-auto logout-item">
                    <a class="nav-link text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                    </a>
                </li>
            </ul>

        </div>
    </div>
        {{-- Modal de confirmación de Cerrar sesión --}}
    <div class="modal fade" id="logoutModal" style="position: absolute;z-index: 10050;" tabindex="-1" role="dialog"
        aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Cerrar sesión</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Cerrar"></button>

                </div>
                <div class="modal-body">¿Estás seguro de que deseas cerrar sesión?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Barra superior -->
    <div class="topbar d-flex align-items-center px-4 bg-white shadow-sm">
        <!-- Botón para abrir/cerrar el menú (solo visible en pantallas pequeñas) -->
        <button id="toggleSidebar" class="btn btn-outline-primary d-md-none me-auto">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Perfil del usuario -->
        <div class="dropdown ms-auto">
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" role="button"
                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 fw- fs-5 text-dark">{{ Auth::guard('admin')->user()->pri_nombre . ' ' . Auth::guard('admin')->user()->pri_apellido }}</span>
                <i class="fas fa-user-circle fa-2x text-primary"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="nav-link text-danger" href="#" data-toggle="modal" data-target="#logoutModal" style="margin-left: 10%">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <h1 class="mb-4"></h1>
    <!--contenido-->
    <div class="main-content ">
        @yield('content')
    </div>
    <!-- Tarjetas (Contenido de la primera imagen) -->

    <!--javascript para el boton para abrir el menu-->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    </script>
    <!-- Bootstrap JS -->
     <!-- Incluir jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('titulo', 'Panel Administrativo') - Agrovalle Honduras</title>
    <!-- Enlace dinámico a CSS con asset() -->
    <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="
    anonymous"></script>

</head>

<body class="sb-nav-fixed">

    <!-- NAVBAR SUPERIOR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTM1ygZSqsToBI0zn2PpiGy6MZY2E_sZ6n_bbNOlns3soew8CWto66BmEo&s=10" alt="Agrovalle Honduras" class="img-fluid mh-100" >
        </a> -->
        
        <a class="navbar-brand ps-3 font-weight-bold" href="">
            Agrovalle Honduras
        </a>
        <div class="">
            <div class="text-light">Usuario: @yield('usuario', 'Usuario no autenticado')</div>
        </div>
        <button class="btn btn-link btn-sm me-4 me-lg-0 text-danger" id="btnLogout">
            Cerrar Sesión
        </button>
        
    </nav>

    <div id="layoutSidenav">
        <!-- SIDEBAR LATERAL -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-success " id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-light">Módulos de Gestión</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line text-info"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked text-info"></i></div>
                            Insumos
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-field text-info"></i></div>
                            Proveedores
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users text-info"></i></div>
                            Empleados
                        </a>
                    </div>
                </div>
            </nav>
        </div>

    
        <!-- CONTENIDO DINÁMICO -->
        <div id="layoutSidenav_content">
            
            <main>
                <div class="container-fluid px-4 mt-4">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                    @endif
                    @yield('contenido')
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small text-muted">
                        <div>© 2026 Agrovalle Honduras - Sistema de Control y Gestión</div>
                        <div>ISC-305 Programación Web | UNAH III PAC 2026</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('plantilla/js/scripts.js') }}"></script>
</body>
</html>
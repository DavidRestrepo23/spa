<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href=" {{ asset('vendors/dashboard/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard - la quinta agencia</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/datatables.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <link href="  {{ asset('vendors/dashboard/assets/css/now-ui-dashboard.css?v=1.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="  {{ asset('vendors/dashboard/assets/demo/demo.css') }}" rel="stylesheet" />

    <link href="  {{ asset('css/button-circle.css') }}" rel="stylesheet" />
    <link href="  {{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="  {{ asset('css/input-file.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendors/multiple-select/multiple-select.css') }}">
    <link href="{{ asset('vendors/summernote/summernote-lite.css') }}" rel="stylesheet">
    <style>
        .card .card-header{
            padding: 5px;
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="red">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="http://laquintaagencia.com/blog.php" class="simple-text logo-normal text-center">
                    <img src="{{ asset('img/icon.png') }}" style="width: 60px;" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                     <li>
                        <a href="{{ route('posts.create') }}">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Crear nueva entrada</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Mis Entradas</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}">
                            <i class="now-ui-icons business_briefcase-24"></i>
                            <p>Categorias</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}">
                            <i class="now-ui-icons location_bookmark"></i>
                            <p>Etiquetas</p>
                        </a>
                    </li>
                    <hr>             
                </ul>
            </div>
        </div>
        <div class="main-panel">
           
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">@yield('title', 'DASHBOARD')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        {{-- <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form> --}}
                        <ul class="navbar-nav">
                            
                            @can('display.menu.config')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i style="font-size: 10pt;" class="fas fa-cogs"></i> Configuración
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    @can('create.users')
                                    <a class="dropdown-item" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> Crear Usuario</a>
                                    @endcan
                                    @can('index.users')
                                    <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i> Usuarios</a>
                                    @endcan
                                    @can('index.roles')
                                    <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fas fa-shield-alt"></i> Roles y permisos</a>
                                    @endcan
                                </div>
                            </li> 
                            @endcan
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_circle-08"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Cuenta</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('profiles.edit', auth()->user()->id) }}"><i class="fas fa-user-circle"></i> Mi Perfil</a>
                                    <a class="dropdown-item" href="{{ route('security.edit', auth()->user()->id) }}"><i class="fas fa-lock"></i> Seguridad</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
             <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('vendors/dashboard/assets/js/core/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="{{ asset('vendors/summernote/summernote-bs4.js') }}"></script>
<script src="  {{ asset('vendors/dashboard/assets/demo/demo.js') }}"></script>

<!-- Chart JS -->
<script src="  {{ asset('vendors/dashboard/assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="  {{ asset('vendors/dashboard/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="  {{ asset('vendors/dashboard/assets/js/now-ui-dashboard.js?v=1.0.1') }}"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('vendors/multiple-select/multiple-select.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/datatables.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

<script src=" {{asset('js/datatables.js')}} "></script>
<script src=" {{asset('js/slug.js')}} "></script>
<script src="{{ asset('js/editor.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/input-file.js') }}"></script>




<script>
    $('#slug').slugify('#title');

    $(function() {
        $('.selectpicker').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%',
            placeholder: "Seleccione las etiquetas",
            filter: true
        });
    });
</script>

@if(session('flash'))
    <script>
        notification_success('{{ session('flash') }}');
    </script>
@endif
@if(session('flash_error'))
    <script>
        notification_error('{{ session('flash_error') }}');
    </script>
@endif


</html>

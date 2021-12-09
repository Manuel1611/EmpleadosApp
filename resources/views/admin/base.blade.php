<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empleados App</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/admin/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <style>
    
        .li-item-mio:hover {
            background-color: rgba(255, 255, 255, .3);
        }
        
        .btnnewmio {
            border: 1px solid rgb(98, 195, 240);
            display: flex;
            align-items: center;
            border-radius: 10px;
            background-color: rgb(98, 195, 240);
            color: black;
            font-size: 1.2em;
            height: 40px;
            padding: 0 10px;
            margin-top: 25px;
            transition: all .3s ease;
        }
        
        .btnnewmio:hover {
            border: 1px solid lightblue;
            color: black;
            background-color: lightblue;
            text-decoration: none;
        }
        
        .linktablemio {
            color: rgb(47, 86, 200);
            text-transform: uppercase;
            text-decoration: none;
        }
        
        .linktablemio:hover {
            color: black;
            text-decoration: underline;
        }
        
        .spanmio {
            font-size: 1.3em;
        }
        
        .center-doesntexist {
            margin-top: 50px;
            width: 100%;
            text-align: center;
            font-size: 1.5em;
        }
        
        .welcomeempapp {
            width: 75%;
            margin: 0 auto;
            height: 75%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            font-size: 2em;
            text-align: center;
        }
        
        .empapptitle {
            text-align: center;
            font-size: 4em;
            font-weight: 900;
            color: rgb(47, 86, 200);
        }
        
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand-text mx-3" style="text-align:center;font-size: 1.1em; color:white;margin-top:10px;margin-bottom:10px">Empleados App <sup>MG</sup></div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="text-align: center; font-size: 1em">
                Navegación
            </div>
            
            <br>

            <!-- Nav Item - Pages Collapse Menu -->
            <a class="li-item-mio" href="{{ url('puesto') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease">Puestos</a>
                
             <br>
            
            <a class="li-item-mio" href="{{ url('departamento') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease">Departamentos</a>
            
             <br>
            
            <a class="li-item-mio" href="{{ url('empleado') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease">Empleados</a>

            <br>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex" style="height: 260px">
                <div style="width:100px; height:100px; border-radius:100%;
                background: url('{{ url('assets/admin/img/empleado.jpg') }}') center center no-repeat; background-size: cover;"
                class="sidebar-card-illustration mb-2"><div>
                <p style="margin-top: 120px" class="text-center mb-2">
                    <strong>Empleados</strong><br> es el ejercicio que puntúa para el primer trimestre en la asignatura de Carmelo
                </p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
            
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div style="font-size: 1.8em">
                        
                        <span style="font-weight: 600; text-transform: uppercase">Aplicación Empleados</span> - Manuel García Arquelladas
                        
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow mx-1" style="margin-top: 20px">
                            <a href="{{ url('/') }}" style="margin-right: 20px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0
                                    .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5
                                    0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6
                                    6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                                </svg>
                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1" style="margin-top: 20px">
                            <a class="li-item-mio" href="{{ url('puesto') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                                margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease;
                                background-color:rgb(48, 87, 201);">Puestos</a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1" style="margin-top: 20px">
                            <a class="li-item-mio" href="{{ url('departamento') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                                margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease;
                                background-color:rgb(48, 87, 201);">Departamentos</a>
                        </li>
                        
                        <li class="nav-item dropdown no-arrow mx-1" style="margin-top: 20px">
                            <a class="li-item-mio" href="{{ url('empleado') }}" style="padding: 10px 15px; border: 1px solid rgba(255, 255, 255, .5); width: 80%;
                                    margin: 0 auto; border-radius: 10px; text-align: center; color:white; text-decoration:none;transition: all .3s ease;
                                    background-color:rgb(48, 87, 201);">Empleados</a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: .9em">mgarcia1611</span>
                                <img class="img-profile rounded-circle" style="width:50px; height: 50px"
                                    src="{{ url('assets/admin/img/undraw_profile.svg') }}">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            
            @if(\Request::route()->getName() == '')
                <div class="welcomeempapp">
                    <div>BIENVENIDO</div>
                    <div class="empapptitle">EMPLEADOS APP</div>
                    <div>Gestiona tus empleados, así como los departamentos y los puestos</div>
                </div>
            @endif
            
            @if(\Request::route()->getName() != '')
                @yield('cuerpo')
            @endif
            
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto" style="font-size: 1em">
                        <span>Copyright &copy; Empleados App 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    
    @yield('js')

</body>

</html>
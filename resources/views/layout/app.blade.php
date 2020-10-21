<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Golden</title>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!--bootstrap-vue-->
    <link type="text/css" rel="stylesheet" href="{{asset('//unpkg.com/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet"
        href="{{asset('//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css')}}" />

    <script src="{{asset('//unpkg.com/vue@latest/dist/vue.min.js')}}"></script>
    <script src="{{asset('//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js')}}"></script>

    {{-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/customstyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/loading.css')}}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <div class="fixed-top d-flex flex-column">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Operations
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <router-link class="dropdown-item" to="/truck_trailer_driver">
                                                TruckTrailerDrivers
                                            </router-link>
                                            <router-link class="dropdown-item" to="/allocations">Allocations
                                            </router-link>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Documents</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Trucks
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <router-link class="dropdown-item" to="/trucks">All Trucks</router-link>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/trailers">Trailers</router-link>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            HR
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <router-link class="dropdown-item" to="/people">All People</router-link>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        {{-- Loading our components here --}}
                        <router-view></router-view>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Golden Group {{ date('Y') }}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    {{-- <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script> --}}
    {{-- <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}
    <!-- Page level custom scripts -->


</body>

</html>

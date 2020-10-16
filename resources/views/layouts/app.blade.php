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
    <link type="text/css" rel="stylesheet" href="{{asset('//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css')}}" />

    <script src="{{asset('//unpkg.com/vue@latest/dist/vue.min.js')}}"></script>
    <script src="{{asset('//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js')}}"></script>

    {{-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('customstyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/loading.css')}}" rel="stylesheet">


</head>

<body>
    <div id="app">
        @yield('content')
    </div>

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

    @yield('scripts')

</body>

</html>
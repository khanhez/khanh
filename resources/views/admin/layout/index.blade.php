<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="{{asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin_css/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin_css/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin_css/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
  
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layout.header')

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->
        @include('sweet::alert')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin_css/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin_css/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin_css/dist/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin_css/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin_css/ckeditor/ckeditor.js')}}"></script>
    
    
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
   

    <script> CKEDITOR.replace('editor1'); </script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
  
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demo</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_css/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin_css/css/shop-homepage.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css/css/my.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('layouts.header')
    <!-- Page Content -->
    @yield('content')
    <!-- end Page Content -->

    <!-- Footer -->
   	@include('layouts.footer')
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="{{asset('admin_css/js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin_css/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_css/js/my.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script >
    $(function(){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
  </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Khanh</title>

  
    <link href="{{asset('khanh/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('khanh/css/shop-homepage.css')}}" rel="stylesheet">
    <link href="{{asset('khanh/css/my.css')}}" rel="stylesheet">

  
</head>

<body>

    
        @include('layouts.header')



        @yield('khanh')
       
       
        
        @include('layouts.footer')
    
    <script src="{{asset('khanh/ajs/jquery.js')}}"></script>
    
    <script src="{{asset('khanh/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('khanh/js/my.js')}}"></script>

</body>

</html>

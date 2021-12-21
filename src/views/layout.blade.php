<!DOCTYPE html>
<html>
<head> 
    @section('head')
    <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        
        <!-- datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('css/category_treeview.css') }}">

        <title>Category Module</title>

        <!-- Scripts -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="{{ asset('js/app.js') }}"></script>

        <!-- <script src="{{ asset('js/category_treeview.js')}}" type="text/javascript"></script> -->
        <!-- <script src="{{ asset('js/category_search_filter.js')}}" type="text/javascript"></script> -->
        <!-- <script src="{{ asset('js/datepicker.js')}}" type="text/javascript"></script> -->
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
   
</body>
</html>
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" type="image/jpg" href="{{ URL::asset('assets/logo.png'); }}"/>
        <title>NetMD</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
        
        <link href="{{ URL::asset('plugins/bootstrap-4.6.2-dist/css/bootstrap.min.css'); }}" rel="stylesheet">
        <link href="{{ URL::asset('plugins/DataTables/datatables.min.css'); }}" rel="stylesheet">

        <script src="{{ URL::asset('plugins/jquery-3.6.0.min.js'); }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="{{ URL::asset('plugins/bootstrap-4.6.2-dist/js/bootstrap.min.js'); }}"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('css/login.css'); }}" rel="stylesheet">
        <link href="{{ URL::asset('plugins/iconos/style.css'); }}" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
       
    </head>
    <body class="antialiased">
        
        <div class="flex-container body" style="overflow-x: hidden;padding-bottom:25px;">
           <div class="row">
                
                <div class="col-sm-12">
                    @section('content')
                
                    @show
                </div>
           </div>
        </div>
        <footer class="d-flex align-items-center text-white">
            <div class="row w-100">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 d-flex justify-content-center text-white font-weight-bold"> Copyright ©<?php echo date("Y")?></div>
                <div class="col-sm-3"></div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script src="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.all.min.js'); }}"></script>
        <script src="{{ URL::asset('plugins/DataTables/datatables.min.js'); }}"></script>
        <script src="{{ URL::asset('js/index.js'); }}"></script>

    </body>
</html>
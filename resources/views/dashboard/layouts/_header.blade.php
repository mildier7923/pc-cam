<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Normalize-->
<link rel="stylesheet" href="{{ asset('css/normalize.css')}}">

<!-- Google Font: Source Sans Pro -->
<link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

<!-- OverlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<!-- App BASIC -->
<link rel="stylesheet" href="{{ asset('css/basic-global.css')}}">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">

<!-- App SASS -->
<link rel="stylesheet" href="{{ mix('css/app.css')}}">

{{-- Favicon --}}
<link rel="shortcut icon" href="{{ asset('img/icons/icono.jpg')}}" type="image/x-icon">

{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables/buttons.bootstrap4.min.css') }}">

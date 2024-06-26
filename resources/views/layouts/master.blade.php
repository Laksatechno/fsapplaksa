<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
    @php
        $userLevel = auth()->user()->level;
        $title = ($userLevel == "superadmin" || $userLevel == "marketing" || $userLevel == "customer") ? "Laksa Medika" : "Getih Suru Indonesia";
    @endphp
    <title>{{ $title }}</title>
@endif

    <meta name="description" content="Laksa Medika">
    <meta name="keywords" content="Laksa Medika, Yofalab, alat kesehatan, bloodbag, vacutainer, html" />
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('asset/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
    <link rel="manifest" href="__manifest.json">

    {{-- <link href=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/icon.min.css" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css"> --}}
    <link href="https://unpkg.com/@icon/icofont/icofont.css" rel="stylesheet"/>
        <!-- Add Bootstrap 4 CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="{{ URL::asset('asset/DataTables/datatables.min.css')}}" rel="stylesheet">
        {{-- <script src="{{ URL::asset('asset/DataTables/datatables.min.js')}}"></script> --}}
        <link rel="stylesheet" href="{{ URL::asset('assets/css/morris.css')}}">
        <link href="{{ URL::asset('assets/css/icons.css" rel="stylesheet')}}" type="text/css">
        {{-- <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
        <!-- jQuery  -->
        <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.material.min.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        
    {{-- <!-- Tambahkan dependensi DataTables.js Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">
    <!-- Tambahkan dependensi DataTables.js Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons Print JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.print.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons HTML5 JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons Flash JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.flash.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons JSZip JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons PDFMake JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/pdfmake.min.js"></script>
    <!-- Tambahkan dependensi DataTables.js Buttons VFS Fonts -->
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/vfs_fonts.js"></script> --}}

    
</head>

<body style="background-color:#e9ecef;">   
    {{-- #e9ecef --}}
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border" role="status"></div>
    </div>
    <!-- * loader -->

   
<!-- * App Sidebar -->
    <!-- App Capsule -->
    <div id="appCapsule">
            @yield('content')
    </div>
    <!-- * App Capsule -->


    @include('layouts.bottomNav')



    @include('layouts.script')
    

</body>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    <script src="{{ asset('js/bootstrap/bootstrap.js') }}" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/24d21a37ec.js" crossorigin="anonymous"></script>

    @if($datatable)
        <link rel="stylesheet" href="{{ asset('inspinia/plugins/datatables/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('inspinia/plugins/datatables/css/buttons.bootstrap5.min.css') }}">
    @endif


</head>
<body>
    <div class="h-100 d-flex">
        <x-admin.nav-bar :selected="$navBarSelected" />
        <main class="content">
            {{ $slot }}
        </main>
    </div>
    @if ($datatable)
    <script src="{{ asset('inspinia/plugins/jquery/js/jquery.min.js') }}"></script>

    <!-- DataTables Core -->
    <script src="{{ asset('inspinia/plugins/datatables/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- DataTables Buttons & Dependencies -->
    
    <script src="{{ asset('inspinia/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/buttons.colVis.min.js') }}"></script>
    

    <!-- PDF and Excel Export Support -->
    
    <script src="{{ asset('inspinia/plugins/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/datatables/js/vfs_fonts.js') }}"></script>
    

    <script src="{{ asset('js/' . $dataTableName) }}"></script>
    @endif


</body>
</html>
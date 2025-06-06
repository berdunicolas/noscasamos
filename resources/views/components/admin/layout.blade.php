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

    @foreach ($cssStyles as $style)
        <link rel="stylesheet" href="{{ $style }}">
    @endforeach


</head>
<body>
    <div class="d-flex">
        <x-admin.nav-bar :selected="$navBarSelected" />
        <main class="content {{($overflowHidden) ? 'overflow-hidden h-100' : ''}}">
            {{ $slot }}
        </main>
    </div>
    <div aria-live="polite" aria-atomic="true" class="position-absolute">
        <!-- Position it: -->
        <!-- - `.toast-container` for spacing between toasts -->
        <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
        <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toast-containter">
            <!-- Then put toasts within -->
            <div
                class="toast align-items-center text-bg-dark border-0"
                id="toast-model"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
            >
                <div class="d-flex">
                    <div class="toast-body">
                    </div>
                    <button
                        type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close"
                    ></button>
                </div>
            </div>
        </div>
    </div>


    {{--
    <div class="h-100 d-flex">
    </div>--}}
    <script src="{{ asset('js/toasts.js') }}"></script>
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

    @foreach ($jsScripts as $script)
        <script src="{{ $script }}"></script>
    @endforeach


</body>
</html>
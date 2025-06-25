<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Invitados</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{asset('guest-admin/css/panel.css')}}">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="{{asset('guest-admin/js/jquery-1.8.2.min.js')}}"></script>
        <script src="{{asset('guest-admin/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('guest-admin/js/main.js')}}"></script>

        <link href="{{asset('assets/css/icons/css/all.min.css')}}" rel="stylesheet">
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/b-3.0.2/b-html5-3.0.2/datatables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css" rel="stylesheet">
    </head>
    <body>

    @php
        if (isset($_SESSION['user_info']) && is_array($_SESSION['user_info'])){
            
            $con = "SELECT * FROM invitados WHERE `boda` =" . $boda ." ORDER BY date DESC";
            $con_result = mysqli_query($link, $con) or die('request "Could not execute SQL query" ' . $con);
            $total = mysqli_num_rows($con_result);
            
            $con2 = "SELECT * FROM invitados WHERE `boda` =".$boda." AND asiste='si'";
            $con2_result = mysqli_query($link, $con2) or die('request "Could not execute SQL query" ' . $con2);
            $asisten = mysqli_num_rows($con2_result);
            
            $con3 = "SELECT * FROM invitados WHERE `boda` =".$boda." AND asiste='no'";
            $con3_result = mysqli_query($link, $con3) or die('request "Could not execute SQL query" ' . $con3);
            $faltan = mysqli_num_rows($con3_result);
        }
    @endphp

@php
$total = $total;
$asisten = $asisten;
$faltan = $faltan;
    
@endphp
        <header>
            <div>
                <h2>Lista de invitados</h2>
            </div>
            <div>
                <form id="login-form" method="POST" action="{{route('invitation.logout', ['invitation' => $invitation->path_name])}}">
                    @csrf
                    <button type="submit" ><i class="far fa-arrow-right-from-bracket"></i> <span>Salir</span></button>
                </form>
            </div>
        </header>
        <section>
            <div>
                <span><b>{{$total}}</b> confirmados</span>
                <span><b>{{$asisten}}</b> asisten</span>
                <span><b>{{$faltan}}</b> no asisten</span>
            </div>
            <div>
                <!--<button class="link modal-button" href="#myModal2"><i class="far fa-plus"></i> Agregar invitado</button>-->
            </div>
        </section>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th data-priority="1">Nombre</th>
                    <th>Asiste</th>
                    <th>Acompañante</th>
                    <th>Alimentación</th>
                    <th class="none">Email</th>
                    <th class="none">Teléfono</th>
                    <th class="none">Traslado</th>
                    <th class="none">Comentarios</th>
                    <th class="none">Fecha Confirmación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($con as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->asiste}}</td>
                        <td>{{$item->nombre_a}}</td>
                        <td>{{$item->alimento}}</td>
                        <td class='none'>{{$item->mail}}</td>
                        <td class='none'>{{$item->telefono}}</td>
                        <td class='none'>{{$item->traslado}}</td>
                        <td class='none'>{{$item->comentarios}}</td>
                        <td class='none'>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            <a href="https://evnt.ar" target="_blank"><b>Evnt</b>.ar</a>
        </footer>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
        <script src="assets/js/modal.js"></script>
        <script>
            var table = new DataTable('#example', {
                order: [[ 9, "desc" ]],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/es-AR.json',
                    lengthMenu: "_MENU_ Invitados",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ invitados",
                    infoEmpty: "Mostrando 0 a 0 de 0 invitados"
                },
                responsive: true,
                layout: {
                    topEnd: {
                        search: {
                            placeholder: 'Buscar'
                        },
                        buttons: [
                            {
                                extend: 'excel',
                                text: 'Exportar'
                            }
                        ]
                    }
                }
            });
        </script>
    </body>
</html>


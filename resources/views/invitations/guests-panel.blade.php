@php
// ********************************************************
//            ID DE BODA
// ********************************************************

$idboda="0";

// ********************************************************
$servername = "localhost";
$user = "evnt_evnt";
$pass = "DpbyIAnWEck6";
$dbname = "evnt_evnt";
$link = '';//mysqli_connect($servername, $user, $pass, $dbname);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



$boda = $idboda;


// admin


/*
@session_name('LoginForm');
@session_start();
*/
error_reporting(0);
@endphp

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
    
        $error = '';
        if (isset($_POST['is_login'])) {
            $sql = "SELECT * FROM php_users_login WHERE `email` = '" . $_POST['email'] . "' AND `password` = '" . $_POST['password'] . "'";
            $sql_result = mysqli_query($link, $sql) or die('request "Could not execute SQL query" ' . $sql);
            $user = mysqli_fetch_assoc($sql_result);
            if (!empty($user)) {
                $_SESSION['user_info'] = $user;
                $query = " UPDATE  php_users_login SET last_login = NOW() WHERE id=" . $user['id'];
                mysqli_query($link, $query) or die('request "Could not execute SQL query" ' . $query);
            } else {
                $error = 'E-mail o contraseña incorrecto.';
            }
        }

        if (isset($_GET['ac']) && $_GET['ac'] == 'logout') {
            $_SESSION['user_info'] = null;
            unset($_SESSION['user_info']);
        }
        @endphp
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
    @endphp
            
            <header>
                <div>
                    <h2>Lista de invitados</h2>
                </div>
                <div>
                    <form id="login-form" name="form1">
                        <a href="index.php?ac=logout"><i class="far fa-arrow-right-from-bracket"></i> <span>Salir</span></a>
                    </form>
                </div>
            </header>
            <section>
                <div>
                    <span><b><?php echo $total; ?></b> confirmados</span>
                    <span><b><?php echo $asisten; ?></b> asisten</span>
                    <span><b><?php echo $faltan; ?></b> no asisten</span>
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
                    @php
                    while ($row = mysqli_fetch_assoc($con_result)) {
                        echo
                        "<tr>" .
                        "<td>" . $row["nombre"] . "</td>" .
                        "<td>" . $row["asiste"] . "</td>" .
                        "<td>" . $row["nombre_a"] . "</td>" .
                        "<td>" . $row["alimento"] . "</td>" .
                        "<td class='none'>" . $row["mail"] . "</td>" .
                        "<td class='none'>" . $row["telefono"] . "</td>" .
                        "<td class='none'>" . $row["traslado"] . "</td>" .
                        "<td class='none'>" . $row["comentarios"] . "</td>" .
                        "<td class='none'>" . $row["date"] . "</td>" .
                        "</tr>";
                    }
                    @endphp
                </tbody>
            </table>
            <footer>
                <a href="https://evnt.ar" target="_blank"><b>Evnt</b>.ar</a>
            </footer>

@php
} else { @endphp
            <div class="image"></div>
            <div class="login">
                <h2>Lista de invitados</h2>
                <p>Ingresa el <b>código de su evento</b> para acceder</p>
                <form id="login-form" class="login-form" name="form1" method="post" action="index.php">
                    <input type="hidden" name="is_login" value="1">
                    <input id="email" name="email" class="form-control required" type="hidden" value="demo1@demo.com">
                    <input id="password" name="password" type="password" placeholder="*****"/><br/>
                    <button name="submit" type="submit" value="Ingresar">Ingresar</button>
                    @php if ($error) { @endphp
                        <em>
                            <label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
                        </em>
                    @php } @endphp
                </form>
                <a href="https://evnt.ar" target="_blank"><b>Evnt</b>.ar</a>
            </div>
        @php } @endphp

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


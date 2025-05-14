@php


$clasic = '"Old Standard TT", serif;';
$minimal = '"Poppins", sans-serif;';
$script = '"Sacramento", cursive;';
$deco = '"Parisienne", cursive;';
$display = '"Abril Fatface", cursive;';
$fiber = '"Permanent Marker", cursive;';
if (isset($_GET['n'])) {
    $invitadon = $_GET['n'];
} else {
    $invitadon = "";
}
if (isset($_GET['c'])) {
    $invitadoc = $_GET['c'];
} else {
    $invitadoc = "";
}


// PERSONALIZACIÓN ---------------------//

$pcolor = "#E2BF83"; //Color Principal//
$bcolor = "#F6F4F0"; //Color de Fondo//
$style = "c"; //c = Claro o = Oscuro//
$font = $clasic; //Estilo de Texto//
$icontype = "a"; // Tipo de icono a = Animado
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

$proveedor = "noscasamos"; //Nombre Archivo HTML//
// EVENTO  ---------------------//

$nombres = "Flor y Santi";
$nombresrsvp = $nombres; //Reemplazar si se usan caracteres especiales en los nombres.

$dia = "29";
$mes = "12";
$mestxt = "Diciembre";
$ano = "2025";
$hs = "20:00:00";

$tz = "+ 3 hours"; //Zona horaria en negativo ej: buenos aires + 3 en lugar de - 3       
$fecha = $mes . "/" . $dia . "/" . $ano . " " . $hs;
$fechat = $dia . " de " . $mestxt;
$fechali = date_format(date_create($fecha), 'YmdHis');
$fechalip = date('YmdHis', strtotime($fechali . $tz));
$fechalif = date('YmdHis', strtotime($fechalip . '+ 5 hours'));
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$dias = "Días";
$horas = "Hs";
$minutos = "Min";
$segundos = "Seg";

// PORTADA  ---------------------//

$sobre = "s"; // s = Si o n = No//

$portada = "ff"; //ff = Full Foto - dd = Full Diseño - f = Foto - d = Diseño v = Video vv = Video Central //
$header = "n"; // s = Mostrar header en diseños full

$logo = ""; // Ej: logo.svg / n = No muestra nada. / Vacío = Muestra nombres
$central = ""; // Ej: central.png / n = No muestra nada. / Vacío = Muestra titulo y bajada
$videoportada = "video";

$titulo = "¡Nos Casamos!";
$bajada = "y queremos compartirlo con vos.";

// Botón flotante
$btnfloat = "s"; // s = Si o n = No       
$btnfloatlink = "https://api.whatsapp.com/send?phone=5493815802802&text=Hola!+Quiero+una+invitacion+para+mi+evento"; //Si esta vacío ejecuta confirmación de asistencias. //
$btnfloaticon = "fab fa-whatsapp";
$btnfloatcolor = $pcolor;

// SAVE THE DATE ------------------//

$std = "s"; // s = Si o n = No//
$stdsubtitulo = "Agendá la fecha";
$stdtitulo = $fechat;
$stdbtn = "Agendar fecha";
$stdbtnicons = "";
$stdbtnicon = "mzfjzfjs";
$stdbtniconf = "fa-calendar-check";
$stdlink = "";
$stdmarco = $marco;

// MULTIMEDIA ---------------------//

$musica = "s"; // s = Si o n = No//
$cancion = "musica.mp3";

$galeria = "s"; // s = Si o n = No//
$galeriaicons = "hover-flash";
$galeriaiconf = "fa-camera-retro";
$galeriaicon = "wsaaegar";
$galeriaantetitulo = "Álbum de Fotos";
$galeriatitulo = "Momentos únicos";
$galeriamarco = $marco;

$video = ""; // ID del video ej: zpSBU0eUmmw
$videocanal = "youtube"; // youtube o vimeo
$videoformato = "h"; // v = Vertical o h = Horizontal
$videoantetitulo = "Video";
$videotitulo = "";
$videomarco = $marco;

// EVENTOS ---------------------//

$evento1 = "s"; // s = Si
$evento1titulo = "Civil";
$evento1icons = "";
$evento1iconf = "fa-rings-wedding";
$evento1icon = "czmrowis";
$evento1img = "evento1.png";
$evento1dia = "28"; // Vacío oculta la fecha
$evento1mes = $mestxt;
$evento1hs = "17:00"; // Vacío oculta la hora
$evento1hstxt = "Horas";
$evento1lugar = "Registro Civil de Palermo"; // Vació oculta dirección
$evento1info = "";
$evento1btn = "Cómo llegar";
$evento1link = "https://maps.google.com"; //Link del boton

$evento2 = "s"; // s = Si
$evento2titulo = "Ceremonia";
$evento2icons = "";
$evento2iconf = "fa-church";
$evento2icon = "fshosubk";
$evento2img = "evento2.png";
$evento2dia = $dia; // Vacío oculta la fecha
$evento2mes = $mestxt;
$evento2hs = "20:00"; // Vacío oculta la hora
$evento2hstxt = "Horas";
$evento2lugar = "Parroquia Nuestra Señora del Rosario"; // Vació oculta dirección
$evento2info = "Bonpland 1987, Buenos Aires";
$evento2btn = "Cómo llegar";
$evento2link = "https://maps.google.com"; //Link del boton

$evento3 = "s"; // s = Si
$evento3titulo = "Festejo";
$evento3icons = "";
$evento3iconf = "fa-champagne-glasses"; 
$evento3icon = "ohcuigqh"; // Copas: yvgmrqny - Fiesta: ohcuigqh
$evento3img = "evento3.png";
$evento3dia = $dia; // Vacío oculta la fecha
$evento3mes = $mestxt;
$evento3hs = "21:00"; // Vacío oculta la hora
$evento3hstxt = "Horas";
$evento3lugar = "Howard Jonson"; // Vació oculta dirección
$evento3info = "Av. Figueroa Alcorta 5575, BsAs.";
$evento3btn = "Cómo llegar";
$evento3link = "https://maps.google.com"; //Link del boton

$dresscode = "s"; // s = Si
$dresscodetitulo = "Dress Code";
$dresscodeicons = "";
$dresscodeiconf = "fa-clothes-hanger";
$dresscodeicon = "dkyhucjt";
$dresscodeimg = "dresscode.png";
$dresscodetxt = "Formal - Elegante";
$dresscodeinfo = "El Blanco queda reservado para La Novia";
$dresscodebtn = "";
$dresscodelink = "http://www.google.com";

$eventosmarco = $marco;

// BIENVENIDA ---------------------//

$bienvenida = "s"; // s = Si o n = No //
$bienvenidatitulo = "Bienvenidos!";
$bienvenidatxt = "Esto es un ejemplo, donde podrás ver las principales características que incluyen nuestras invitaciones. <br><br>Todos los módulos, contenidos, fotos, textos, colores y tipo de letra, son opcionales y se personalizan 100% para tu evento. <br><br>Esperamos que te guste!";
$bienvenidaicons = "hover-heartbeat-alt";
$bienvenidaiconf = "fa-heart";
$bienvenidaicon = "aydxrkfl";
$bienvenidaimg = "";
$bienvenidamarco = $marco;

// CONTENIDOS ---------------------//

$historia = "s"; // s = Si o n = No //
$historiatitulo = "Nuestra Historia";
$historiatxt = "Dicen que todos los caminos conducen a Roma. Como los nuestros, que un día de Septiembre hace algunos años, con una selfie y un desayuno dieron como resultado atardeceres en la playa y el comienzo de un amor de verano.<br><br>
Luego vinieron viajes, muchas risas, una mudanza, momentos compartidos en familia y aventuras con amigos. Un amor de verano que se transformó en uno para toda la vida";
$historiaicons = "hover-heartbeat-alt";
$historiaiconf = "fa-heart";
$historiaicon = "aydxrkfl";
$historiaimg = "historia.jpg";

$info = "s"; // s = Si o n = No //
$infoderecha = "s"; // s = Texto a la derecha
$infotitulo = "Wedding Timeline";
$infotxt = "";
$infoicons = "hover-heartbeat-alt";
$infoiconf = "fa-heart";
$infoicon = "warimioc"; // Corazon: aydxrkfl - Reloj: warimioc
$infoimg = "timeline.svg";
$infomarco = $marco;

$info2 = ""; // s = Si o n = No //
$info2derecha = "s"; // s = Texto a la derecha
$info2titulo = "";
$info2txt = "";
$info2icons = "hover-heartbeat-alt";
$info2iconf = "fa-heart";
$info2icon = "aydxrkfl";
$info2img = "info.png";
$info2marco = $marco;

$destacado = "s"; // s = Si o n = No //
$destacadotitulo = "La medida del amor es amar sin medida";
$destacadotxt = "San Agustín";
$destacadoicons = "hover-heartbeat-alt";
$destacadoiconf = "fa-heart";
$destacadoicon = "";
$destacadoimg = "destacada.jpg";

// INTERACTIVOS ---------------------//

$inter1 = "s"; // s = Si o n = No //
$inter1icons = "";
$inter1iconf = "fa-spotify";
$inter1icon = "xsiktwiz";
$inter1titulo = "Nuestra Playlist";
$inter1txt = "Agrega nuestra playlist y recomendá las canciones que no pueden faltar en nuestra boda";
$inter1btn = "Ir a Spotify";
$inter1link = "https://open.spotify.com/playlist/76enN7Gwvt3IP0IPIEkZON?si=uLjHUPcVSsGJmx0X7C_89A";

$inter2 = "s"; // s = Si o n = No //
$inter2icons = "s";
$inter2iconf = "fa-instagram";
$inter2icon = "tgyvxauj";
$inter2titulo = "#NosCasamos";
$inter2txt = "Sumate a la boda compartiendo fotos y videos con nuestro hashtag.";
$inter2btn = "Ir a Instagram";
$inter2link = "https://www.instagram.com/explore/tags/noscasamos/";

$inter3 = ""; // s = Si o n = No //
$inter3icons = "hover-draw";
$inter3iconf = "fa-whatsapp";
$inter3icon = "dnphlhar";
$inter3titulo = "";
$inter3txt = "";
$inter3btn = "";
$inter3link = "";

$interactivosmarco = $marco;

// SUGERENCIAS ---------------------//

$sugerencias = "s"; // s = Si o n = No //

$sugerenciasantetitulo = "Sugerencias";
$sugerenciastitulo = "Puntos de interés";
$sugerenciastxt = "¿Estarás de visita en la ciudad?<br> Te recomendamos algunos lugares para visitar y hospedarte";
$sugerenciasicons = "";
$sugerenciasiconf = "fa-signs-post";
$sugerenciasicon = "kjeyqivm";

$sugerencia1 = "Sheraton Hotel";
$sugerencialink1 = "";
$sugerencia2 = "Miravida Soho Hotel";
$sugerencialink2 = "";
$sugerencia3 = "Magnolia Hotel Boutique";
$sugerencialink3 = "";
$sugerencia4 = "Mine Hotel Boutique";
$sugerencialink4 = "";
$sugerencia5 = "Rendez Vous Hotel";
$sugerencialink5 = "";
$sugerencia6 = "The Glu Hotel";
$sugerencialink6 = "";
$sugerencia7 = "";
$sugerencialink7 = "";
$sugerencia8 = "";
$sugerencialink8 = "";
$sugerencia9 = "";
$sugerencialink9 = "";
$sugerencia10 = "";
$sugerencialink10 = "";
$sugerencia11 = "";
$sugerencialink11 = "";
$sugerencia12 = "";
$sugerencialink12 = "";

$sugerenciasmarco = $marco;

// REGALOS ---------------------//

$regalos = "s"; // s = Si o n = No //
$regalosbg = "gifts.jpg"; //gifts.jpg
$regalosimg = ""; // regalos.png
$regalosicons = "";
$regalosiconf = "fa-gift";
$regalosicon = "kezeezyg";
$regalostitulo = "Regalos";
$regalostxt = "Tu presencia es lo más importante para nosotros. <br>Si además quieres hacernos un regalo, puedes ayudarnos con nuestra luna de miel";
$regalosbtn = "Más información";
$regaloslink = "";

$regalo1 = "s"; // s = Si o n = No //
$regalotitulo1 = "Cuenta Bancaria";
$regalotxt1 = "
    Cuenta: Nombre Banco<br>
    <b>Titular:</b>Nos Casamos
    <b>Alias:evnt.digital</b>
";
$regalocodigo = "CBU"; // CBU - CVU - Alias 
$regalocbu = "0000003100080249610246";
$btncopiar = "s"; // s = Boton visible
$regalocbucopiabtn = "Copiar " . $regalocodigo;
$regalocbucopiamsg = "Copiado en portapapeles!";

$regalo2 = "n"; // s = Si o n = No //
$regalotitulo2 = "Cuenta Bancaria en Dólares";
$regalotxt2 = "
    Cuenta:<br>
    <b>Titular:</b>
    <b>Alias:</b>
    <b>CBU:</b>
";
$regalobtn2 = "";
$regalolink2 = "";

$regalo3 = "s"; // s = Si o n = No //
$regalotitulo3 = "Buzón en Salón";
$regalotxt3 = "En caso que prefieras regalar en efectivo, tendrás a disposición un buzón en el salón durante la recepción.";
$regalobtn3 = "";
$regalolink3 = "";

$catalogo = "n"; // s = Si o n = No //
$catalogotitulo = "Ideas de regalos";
$catalogotxt = "Te compartimos algunas opciones que seguro disfrutaremos en nuestra luna de miel.";
$producto1 = "";
$productoimg1 = "gift1.png";
$productoprecio1 = "";
$productolink1 = "";
$producto2 = "";
$productoimg2 = "gift2.png";
$productoprecio2 = "";
$productolink2 = "";
$producto3 = "";
$productoimg3 = "gift3.png";
$productoprecio3 = "";
$productolink3 = "";
$producto4 = "";
$productoimg4 = "gift4.png";
$productoprecio4 = "";
$productolink4 = "";
$producto5 = "";
$productoimg5 = "gift5.png";
$productoprecio5 = "";
$productolink5 = "";
$producto6 = "";
$productoimg6 = "gift6.png";
$productoprecio6 = "";
$productolink6 = "";

// CONFIRMACIÓN DE ASISTENCIAS ---------------------//
/*
$rsvp = "s"; // s = Si o n = No //
$rsvpicos = "s";
$rsvpicof = "fa-clipboard-list";
$rsvpico = "heqlbljj";
$rsvpantetitulo = "rsvp";
$rsvptitulo = "Confirmación de Asistencia";
$rsvptxt = "Esperamos contar con tu presencia";
$rsvplimite = "";
$rsvplimitetxt = "Por favor confirmar antes del";
$rsvpbtn = "Confirmar Asistencia";
$linkconfirmacion = ""; //https://api.whatsapp.com/send?phone=5493815802802&text=%C2%A1Hola%21+quiero+confirmar+mi+asistencia+en+su+boda
// Info extra
$extratitulo = ""; // Ej: Valór de Tarjetas
$extratxt = "";
$extrabtn = "s"; // s = Boton visible
$extrabtntxt = "Cómo abonar"; // Texto del botón
// Formulario

$aclaracionform = "El formulario es individual.<br> Si tu invitación incluye acompañantes repetí el proceso por cada persona."; // 
$asistire = "Asistiré";
$noasistire = "No Asistiré";
$nombre = "Apellido y Nombre";
$correo = "";
$telefono = "";
$menu = "¿Necesitas un menú especial?";
$menu1 = "Ninguno";
$menu2 = "Celíaco";
$menu3 = "Vegetariano";
$menu4 = "Vegano";
$menu5 = "Diabético";
$acompanantes = ""; //Apellido y nombres de acompañantes (si corresponde)
$traslado = "";
$traslado1 = "No, voy por mis propios medios";
$traslado2 = "Si, necesito traslado";
$traslado3 = "";
$traslado4 = "";
$comentarios = "Comentarios";
$msgerror = "Por favor completa todos los campos";
$gracias = "¡Gracias por confirmar tu asistencia!";

*/
$modules = [];

foreach($invitation->modules as $module) {
    if($module['active']){
        $modules[] = App\Enums\ModuleTypeEnum::getModuleComponent($module['name'], $invitation);
    }
}
@endphp


<!DOCTYPE html>
<html>
    <head>
        <meta property="og:image" content="<?php echo $actual_link; ?>images/metaimg.jpg">
        <meta property="og:title" content="<?php echo $nombres; ?> - <?php echo $fechat; ?>">
        <meta property="og:description" content="<?php echo $titulo; ?> <?php echo $bajada; ?>  ">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $actual_link; ?>">

        <title><?php echo $nombres; ?> - <?php echo $fechat; ?> - Evnt.ar</title>
        <link rel="icon" type="image/x-icon" href="{{asset("assets/images/favicon.ico")}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="{{asset("assets/css/bootstrap-reboot.css")}}"/>
@php
if ($style == "c") {
    echo '<link rel="stylesheet" href="'.asset("assets/css/style.css").'?build=@version.1"/>';
} else {
    echo '<link rel="stylesheet" href="'.asset("assets/css/styleb.css").'?build=@version.1"/>';
}
@endphp
        <link rel="stylesheet" href="{{asset("assets/js/wow/animate.css")}}"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="{{asset("assets/css/icons/css/all.css")}}" rel="stylesheet">
        <style>
            body, header{
                background-color: <?php echo $bcolor; ?>;
            }
            h2,h3, .countdown .timer div, header h1{
                font-family: <?php echo $font; ?>
            }
            header h1, .cover .text i, .timer div, .countdown p, .countdown a i, .events .item i, .social .item i, .video span, .gallery span, .hotels span,.hotels i, .hotels .list a i, .gallery i, .gifts i, .modalGift h3, .modalGift .item .right p b, .modalGift .item .right .list a h4, .modalGift .closeModal i, .invites i, .invites span, .confirmation .link i, .confirmation .modalGift .contenido-modal .form label, .confirmation .modalGift .contenido-modal span, .confirmation .modalGift .contenido-modal .thanks i, footer p i, .content .info .text i, .cover .text h1, .cover.full.design .text h2, .cover.design .text h2{
                color: <?php echo $pcolor; ?>;
            }
            .story, .gifts a, .gifts button, .gifts, .confirmation, .confirmation .modalGift .contenido-modal .form .container .checkmark:after, .confirmation .modalGift .contenido-modal .form button, .salon .item .right a, .player .icon{
                background-color: <?php echo $pcolor; ?>;
            }
            .modalGift .contenido-modal .item .right .list a{
                background-color: transparent;
            }
        </style>
    </head>
    <body>

        <!-- ************************************************************************************************************
                            INVITACIÓN
        **************************************************************************************************************-->
{{--
@php    
include './includes/sobre.php';
include './includes/musica.php';
include './includes/portada.php';
include './includes/invitado.php';
include './includes/bienvenida.php';
include './includes/savethedate.php';
include './includes/eventos.php';
include './includes/info.php';

include './includes/regalos.php';
include './includes/confirmacion.php';
include './includes/sugerencias.php';
include './includes/historia.php';
include './includes/info2.php';
include './includes/interactivos.php';
include './includes/video.php';
include './includes/destacado.php';
include '../foot/' . $proveedor . '.html';
@endphp
--}}

@foreach ($modules as $module)
{!!$module!!}
@endforeach

<x-module-foot :seller="$invitation->seller" />


        <!-- ************************************************************************************************************
                            SCRIPTS
        **************************************************************************************************************-->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" >
            $("input").change(function () {

                $("#asiste").val($("input:checked").val());

            });
            $(function () {
                $(".submit").click(function (event) {
                    var asiste = $("#asiste").val();
                    var alimento = $("#alimento").val();
                    var nombre = $("#nombre").val();
                    var nombre_a = $("#nombre_a").val();
                    var traslado = $("#traslado").val();
                    var mail = $("#mail").val();
                    var telefono = $("#telefono").val();
                    var comentarios = $("#comentarios").val();

                    var dataString = 'asiste=' + asiste + '&nombre=' + nombre + '&alimento=' + alimento + '&nombre_a=' + nombre_a + '&traslado=' + traslado + '&mail=' + mail + '&telefono=' + telefono + '&comentarios=' + comentarios;
                    if (nombre === '')
                    {
                        $('.error').fadeOut(200).show();
                    } else
                    {
                        $.ajax({
                            type: "POST",
                            url: "_save.php",
                            data: dataString,
                            success: function (data) {
                                $('.thanks').fadeIn(200).show();
                                $('.cont').fadeOut(200).hide();
                                $("#data").html(data);
                            }
                        });
                    }
                    event.preventDefault();
                });
            });
        </script>
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <script src="{{asset("assets/js/wow/wow.js")}}"></script>
        <script src="{{asset("assets/js/modal.js")}}"></script>
        <script src="{{asset("assets/js/lightbox.js")}}"></script>
        <script>
            wow = new WOW(
                    {
                        boxClass: 'wow', // default
                        animateClass: 'animate__animated', // default
                        offset: 110, // default
                        mobile: true, // default
                        live: true        // default
                    }
            )
            wow.init();

            function GeeksForGeeks() {
                let copyGfGText =
                        document.getElementById("GfGInput");

                copyGfGText.select();
                document.execCommand("copy");

                document.getElementById("gfg")
                        .innerHTML = "<i class='fa fa-circle-check'></i> Copiado en portapapeles!";
            }

            var button = document.getElementById("button");
            var audio = document.getElementById("player");
            button.addEventListener("click", function () {
                if (audio.paused) {
                    audio.play();
                    button.innerHTML = "<div class='icon'><img src='{{asset("assets/images/play.gif")}}'/></div>";
                } else {
                    audio.pause();
                    button.innerHTML = "<div class='icon'><img src='{{asset("assets/images/pause.png")}}'/></div>";
                }
            });
        </script>
    </body>
</html>

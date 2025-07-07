<!DOCTYPE html>
<html>
    <head>
        <meta property="og:image" content="<?php echo $actual_link; ?>images/metaimg.jpg">
        <meta property="og:title" content="<?php echo $nombres; ?> - <?php echo $fechat; ?>">
        <meta property="og:description" content="<?php echo $titulo; ?> <?php echo $bajada; ?>  ">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $actual_link; ?>">

        <title><?php echo $nombres; ?> - <?php echo $fechat; ?> - Evnt.ar</title>
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="../assets/css/bootstrap-reboot.css"/>
        <?php
        if ($style == "c") {
            echo '<link rel="stylesheet" href="../assets/css/style.css?build=@version.1"/>';
        } else {
            echo '<link rel="stylesheet" href="../assets/css/styleb.css?build=@version.1"/>';
        }
        ?>
        <link rel="stylesheet" href="../assets/js/wow/animate.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap" rel="stylesheet">
        <link href="../assets/css/icons/css/all.css" rel="stylesheet">
        <style>
            body, header{
                background-color: <?php echo $bcolor; ?>;
            }
            h2,h3, .countdown .timer div, header h1{
                font-family: <?php echo $font; ?>
            }
            header h1, .cover .text i, .timer div, .countdown p, .countdown a i, .events .item i, .social .item i, .video span, .gallery span, .hotels span, .hotels .list a i, .gifts i, .modalGift h3, .modalGift .item .right p b, .modalGift .item .right .list a h4, .modalGift .closeModal i, .invites i, .invites span, .confirmation .link i, .confirmation .modalGift .contenido-modal .form label, .confirmation .modalGift .contenido-modal span, .confirmation .modalGift .contenido-modal .thanks i, footer p i, .content .info .text i, .cover .text h1, .cover.full.design .text h2, .cover.design .text h2{
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

        <?php 
        include './includes/sobre.php';
        include './includes/musica.php';
        include './includes/portada.php';
        include './includes/invitado.php';
        include './includes/bienvenida.php';
        include './includes/savethedate.php';
        include './includes/eventos.php';
        include './includes/historia.php';
        include './includes/info.php';
        include './includes/info2.php';
        include './includes/destacado.php';
        include './includes/interactivos.php';
        include './includes/video.php';
        include './includes/galeria.php';
        include './includes/sugerencias.php';
        include './includes/regalos.php';
        include './includes/confirmacion.php';
        include '../foot/' . $proveedor . '.html';
        ?>


<!-- ************************************************************************************************************
                    SCRIPTS
**************************************************************************************************************-->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" >
            $("input").change(function(){

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

        <script src="../assets/js/modal.js"></script>
        <script src="../assets/js/lightbox.js"></script>
        <script>
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
                    button.innerHTML = "<div class='icon'><img src='../assets/images/play.gif'/></div>";
                } else {
                    audio.pause();
                    button.innerHTML = "<div class='icon'><img src='../assets/images/pause.png'/></div>";
                }
            });
        </script>
    </body>
</html>
@php

$modules = [];

foreach($invitation->modules as $module) {
    $modules[] = App\Handlers\ModuleHandler::getModuleComponent($module, $invitation);
}

$tituloYBajada =  $invitation->tituloYBajada();

@endphp


<!DOCTYPE html>
<html>
    <head>
        <meta property="og:image" content="{{$invitation->metaImg()}}">
        @if(empty($invitation->meta_title))
        <meta property="og:title" content="{{$invitation->host_names}} - {{$invitation->fechat()}}">
        @else
        <meta property="og:title" content="{{$invitation->meta_title}}">
        @endif
        <meta property="og:description" content="{{$tituloYBajada['titulo']}} {{$tituloYBajada['bajada']}}">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{route('invitation', ['invitation' => $invitation->path_name])}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$invitation->host_names}} - {{$invitation->fechat()}} - {{config('app.name')}}</title>
        <link rel="icon" type="image/x-icon" href="{{asset("assets/images/favicon.ico")}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{asset("assets/css/bootstrap-reboot.css")}}"/>

        @if ($invitation->style == \App\Enums\StyleTypeEnum::LIGHT) 
            <link rel="stylesheet" href="{{asset("assets/css/style.css")}}?build=@version.1"/>
        @else
            <link rel="stylesheet" href="{{asset("assets/css/styleb.css")}}?build=@version.1"/>
        @endif
        <link rel="stylesheet" href="{{asset("assets/js/wow/animate.css")}}"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="{!!getFont($invitation->font)->font_url!!}" rel="stylesheet">
        <link href="{{asset("assets/css/icons/css/all.css")}}" rel="stylesheet">
        <style>
            body, header{
                background-color: {{$invitation->background_color}};
            }
            h2,h3, .countdown .timer div, header h1{
                font-family: {!!getFont($invitation->font)->font_family!!};
            }
            header h1, .cover .text i, .timer div, .countdown p, .countdown a i, .events .item i, .social .item i, .video span, .gallery span, .hotels span,.hotels i, .hotels .list a i, .gallery i, .gifts i, .modalGift h3, .modalGift .item .right p b, .modalGift .item .right .list a h4, .modalGift .closeModal i, .invites i, .invites span, .confirmation .link i, .confirmation .modalGift .contenido-modal .form label, .confirmation .modalGift .contenido-modal span, .confirmation .modalGift .contenido-modal .thanks i, footer p i, .content .info .text i, .cover .text h1, .cover.full.design .text h2, .cover.design .text h2{
                color: {{$invitation->color}};
            }
            .story, .gifts a, .gifts button, .gifts, .confirmation, .confirmation .modalGift .contenido-modal .form .container .checkmark:after, .confirmation .modalGift .contenido-modal .form button, .salon .item .right a, .player .icon{
                background-color: {{$invitation->color}};
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
@foreach ($modules as $module)
{!!$module!!}
@endforeach

        <!-- ************************************************************************************************************
                            SCRIPTS
        **************************************************************************************************************-->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" >
            $("input").change(function () {

                $("#asiste").val($("input:checked").val());

            });
            function sendConfirmation(event, form){
                event.preventDefault();
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
               /* var asiste = $("#asiste").val();
                var alimento = $("#alimento").val();
                var nombre = $("#nombre").val();
                var nombre_a = $("#nombre_a").val();
                var traslado = $("#traslado").val();
                var mail = $("#mail").val();
                var telefono = $("#telefono").val();
                var comentarios = $("#comentarios").val();*/
                /*
                var dataString = 'asiste=' + asiste + '&nombre=' + nombre + '&alimento=' + alimento + '&nombre_a=' + nombre_a + '&traslado=' + traslado + '&mail=' + mail + '&telefono=' + telefono + '&comentarios=' + comentarios;
                if (nombre === '')
                {
                    $('.error').fadeOut(200).show();
                } else
                {*/
                    if (data.nombre === '')
                    {
                        $('.error').fadeOut(200).show();
                    } else
                    fetch(form.action, {
                        method: 'POST',
                        credentials: 'include',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(async response => {
                        const statusCode = response.status;
                        const text = await response.text();
                        const data = text ? JSON.parse(text) : {};
                        return ({ statusCode, data });
                    })
                    .then(async ({statusCode, data}) => {
                        if(statusCode === 201){
                            $('.thanks').fadeIn(200).show();
                            $('.cont').fadeOut(200).hide();
                            $("#data").html(data);
                        } else {
                            console.error(data);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                //}
            }

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

            function GeeksForGeeks(clickable) {
                let copyGfGText = document.getElementById("GfGInput");
                let copyText = clickable.dataset.copyText;

                navigator.clipboard.writeText(copyGfGText.value)
                    .then(() => {
                        document.getElementById("gfg").innerHTML = 
                            "<i class='fa fa-circle-check'></i> " + copyText;
                    })
                    .catch(err => {
                        console.error("Error al copiar: ", err);
                    });
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

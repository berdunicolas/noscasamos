@php
$tituloYBajada =  $invitation->tituloYBajada();
@endphp

<!DOCTYPE html>
<html lang="en">
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
            font-family: {!!getFont($invitation->font)!!}
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
<body style="margin: 0">
    <div class="h-100">
        <div class="d-flex flex-column justify-content-center align-around-center h-75">
            <form action="" method="POST">
                <div class="d-flex flex-column justify-content-center align-around-center mx-4">
                    @csrf
                    <p class="text-center mb-4 fs-4">Ingresa el codigo de la invitación</p>
                    <input style="max-width: 300px" class="mx-auto mb-4 form-control form-control-lg text-center fs-4" name="token" type="password" required placeholder="****">
                    @error('token')
                        <div class="text-center mb-4">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-lg btn-dark px-5 mx-auto">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
    <div style="position:absolute; z-index: -1; top: 0; left: 0; height: 100vh; width: 100vw; backdrop-filter: blur(10px);"></div>
    @if($style == "Light")
    <div class="intro" id="intro" style="z-index: -10 !important;">
        <div class="top" id="top">
            <div class="badge animate__animated animate__zoomIn" data-wow-delay="0.3s" onclick="animar();" data-wow-offset="0">
                <img src="{{$module->data['stamp_image']}}"/>
            </div>
            <img src="{{asset("assets/images/envelopet.png")}}" class="top hiddenM  animate__animated animate__slideInDown" data-wow-offset="0"/>
            <img src="{{asset("assets/images/envelopetm.png")}}" class="top hiddenL  animate__animated animate__slideInDown" data-wow-offset="0"/>
        </div>
        <div class="bottom" id="bottom"></div>
    </div>
    <script src="../assets/js/envelope.js"></script>
    @elseif ($style == "Dark")
        <div class="intro black" id="intro" style="z-index: -10 !important;">
            <div class="top" id="top">
                <div class="badge animate__animated animate__zoomIn" data-wow-delay="0.3s" onclick="animar();" data-wow-offset="0">
                    <img src="{{$module->data['stamp_image']}}"/>
                </div>
                <img src="{{asset("assets/images/envelopetn.png")}}" class="top hiddenM animate__animated animate__slideInDown" data-wow-offset="0"/>
                <img src="{{asset("assets/images/envelopetnm.png")}}" class="top hiddenL animate__animated animate__slideInDown" data-wow-offset="0"/>
            </div>
            <div class="bottom" id="bottom"></div>
        </div>
        <script src="../assets/js/envelope.js"></script>
    @endif
</body>
</html>
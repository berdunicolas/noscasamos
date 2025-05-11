@php
$pcolor = "#E2BF83"; //Color Principal//
$bcolor = "#F6F4F0"; //Color de Fondo//
$style = "c"; //c = Claro o = Oscuro//
//$font = $clasic; //Estilo de Texto//
$icontype = "a"; // Tipo de icono a = Animado
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = "gifts.jpg"; // Imagen de marco para los bloques

$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$video = "zpSBU0eUmmw"; // ID del video ej: zpSBU0eUmmw
$videocanal = "youtube"; // youtube o vimeo
$videoformato = "h"; // v = Vertical o h = Horizontal
$videoantetitulo = "Video";
$videotitulo = "";
$videomarco = $marco;
@endphp

<section class="video wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{(!empty($videomarco)) ? "background-image: url('".asset("boda/images/".$videomarco)."');" : ''}} background-repeat:repeat-x;">
    @empty(!$module['pre_tittle'])
        <span>{{$module['pre_tittle']}}</span>
    @endempty
    @empty(!$module['tittle'])
        <h2>{{$module['tittle']}}</h2>
    @endempty
    <div class="videoPlayer {{$videoformato}} wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
        @if(strtolower($module['type_video']) == "youtube")
        <div class="player" style="background-color:none;">
            <iframe src="https://www.youtube-nocookie.com/embed/{{$module['video_id']}}?si=7CQt0gnEV97CNWwW&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen  style="border-radius:8px;"></iframe>
        </div>
        @endif
        @if (strtolower($module['type_video']) == "vimeo")
        <div class="player">
            <iframe src="https://player.vimeo.com/video/{{$module['video_id']}}?h=b86574a207&autoplay=1&color=A2AE8C&title=0&byline=0&portrait=0" width="640" height="1138" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen  style="border-radius:8px;"></iframe>
        </div>
        @endif
    </div>
</section>
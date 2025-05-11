@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

////

$dia = "29";
$mes = "12";
$mestxt = "Diciembre";
$ano = "2025";
$hs = "20:00:00";

$tz = "+ 3 hours"; //Zona horaria en negativo ej: buenos aires + 3 en lugar de - 3       
$fecha = $mes . "/" . $dia . "/" . $ano . " " . $hs;
$fechat = $dia . " de " . $mestxt;

$dias = "Días";
$horas = "Hs";
$minutos = "Min";
$segundos = "Seg";


////

$stdbtn = "Agendar fecha";
$stdbtnicons = "";
$stdbtnicon = "mzfjzfjs";
$stdlink = "";
$stdmarco = $marco;
@endphp
<section class="countdown wow animate__animated animate__fadeInUp" data-wow-duration="1.5s" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{ (!empty($stdmarco)) ? "background-image: url('images/".$stdmarco."');" : ''}} background-repeat:repeat-x;">
    @if (!empty($stdbtnicon))
        @if($icontype==='Animado')
            <lord-icon class="icon" src="https://cdn.lordicon.com/{{$stdbtnicon}}.json" trigger="{{$trigger}}" state="{{$stdbtnicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
        @else
            <i class="fa-thin {{$module['icon'] ?? 'fa-calendar-check'}}"></i>
        @endif
    @endif
    <br/>
    <p>{{$module['tittle']}}</p>
    <h2>{{$dateTittle}}</h2>
    <div id="countdown" class="timer" data-init-value="{{$fullDateTime}}">
        <div><div id="days"></div><span>{{$module['days_tanslation']}}</span></div>
        <div class="point">:</div>
        <div><div id="hs"></div><span>{{$module['hr_tanslation']}}</span></div>
        <div class="point">:</div>
        <div><div id="min"></div><span>{{$module['min_translation']}}</span></div>
        <div class="point">:</div>
        <div><div id="seg"></div><span>{{$module['sec_translation']}}</span></div>
    </div>
    @if (!empty($stdlink))
        <a href="{{$stdlink}}" target="_blank"><i class="fa-regular fa-calendar-check"></i>{{$stdbtn}}</a>
    @else
        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates={{substr($fechalip, 0, -6) .'T'.substr($fechalip, -6).'Z%2F'.substr($fechalif, 0, -6).'T'.substr($fechalif, -6).'Z&details=%0A&location=&text='.$nombres}}" target="_blank"><i class="fa-regular fa-calendar-check"></i>{{$stdbtn}}</a>
    @endif
    
<!--  <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=<?php echo substr($fechalip, 0, -6); ?>T<?php echo substr($fechalip, -6); ?>Z%2F<?php echo substr($fechalif, 0, -6); ?>T<?php echo substr($fechalif, -6); ?>Z&details=%0A&location=&text=<?php echo $nombres; ?>" target="_blank"><i class="fa-regular fa-calendar-check"></i> Agendar fecha</a>-->
</section>
<script src="{{asset("assets/js/countdown.js")}}"></script>
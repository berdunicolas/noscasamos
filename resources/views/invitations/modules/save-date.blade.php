@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold


$stdbtnicons = "";

$stdmarco = $marco;
@endphp
<section class="countdown wow animate__animated animate__fadeInUp" data-wow-duration="1.5s" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    @if (!empty($module['icon']))
        @if($icontype==='Animado')
            <lord-icon class="icon" src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$stdbtnicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style==="Dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
        @else
            <i class="fa-thin {{$module['icon'] ?? 'fa-calendar-check'}}"></i>
        @endif
    @endif
    <br/>
    <p>{{$module['tittle']}}</p>
    <h2>{{$dateTittle}}</h2>
    @if ($module['is_countdown'])        
        <div id="countdown" class="timer" data-init-value="{{$fullDateTime}}">
            <div><div id="days"></div><span>{{$module['days_tanslation']}}</span></div>
            <div class="point">:</div>
            <div><div id="hs"></div><span>{{$module['hr_tanslation']}}</span></div>
            <div class="point">:</div>
            <div><div id="min"></div><span>{{$module['min_translation']}}</span></div>
            <div class="point">:</div>
            <div><div id="seg"></div><span>{{$module['sec_translation']}}</span></div>
        </div>
    @endif
    @if (!empty($stdlink))
        <a href="{{$stdlink}}" target="_blank"><i class="fa-regular fa-calendar-check"></i>{{$module['text_button']}}</a>
    @else
        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates={{substr($fechalip, 0, -6) .'T'.substr($fechalip, -6).'Z%2F'.substr($fechalif, 0, -6).'T'.substr($fechalif, -6).'Z&details=%0A&location=&text='.$nombres}}" target="_blank"><i class="fa-regular fa-calendar-check"></i>{{$module['text_button']}}</a>
    @endif
    
<!--  <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=<?php echo substr($fechalip, 0, -6); ?>T<?php echo substr($fechalip, -6); ?>Z%2F<?php echo substr($fechalif, 0, -6); ?>T<?php echo substr($fechalif, -6); ?>Z&details=%0A&location=&text=<?php echo $nombres; ?>" target="_blank"><i class="fa-regular fa-calendar-check"></i> Agendar fecha</a>-->
</section>
<script src="{{asset("assets/js/countdown.js")}}"></script>
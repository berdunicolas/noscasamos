@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold


$historiaicons = "hover-heartbeat-alt";

@endphp

<section class="story">
    @empty(!$module['image'])
        <div class="image wow animate__animated animate__fadeInLeft">
            <img src="{{$module['image']}}" alt="{{$module['tittle']}}"/>
        </div>
    @endempty
    @empty(!$module['text'])
    <div class="text wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
        @empty(!$module['icon'])
            @if($icontype==='Animado')
                <lord-icon src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$historiaicons}}" stroke="{{$stroke}}" delay="300" colors="primary:#fff,secondary:#fff" style="width:70px;height:70px"></lord-icon>                
            @else
                <i class="fa-thin {{empty($module['icon']) ? 'fa-heart' : $module['icon']}}"></i>
            @endif
        @endempty
        @empty(!$module['tittle'])
            <h2>{{$module['tittle']}}</h2>
        @endempty
        <p>{!!$module['text']!!}</p>
        <!--<a href="#">Ver más</a>-->
    </div>
    @endempty
</section>

@php

////

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

$bienvenidaicons = "hover-heartbeat-alt";
$bienvenidamarco = $marco;
@endphp


<section class="content wow animate__animated animate__fadeInUp">
    <div class="info">    
        @empty(!$module["tittle"])
            <div class="text">
                @empty(!$module['text'])
                    @if($icontype==='Animado')
                        <lord-icon src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$bienvenidaicons}}" stroke="{{$stroke}}" delay="500" colors="primary:{{($style=="dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$module['icon']}}"></i>
                    @endif
                @endempty
                @empty(!$module['tittle'])
                    <h2>{{$module['tittle']}}</h2>
                @endempty
                <p>{!!$module['text']!!}</p>
                <!--                    <a href="#">Ver más</a>-->
            </div>
        @endempty

        @empty(!$module['image'])
            <div class="image">
                <img src="{{$module['image']}}" alt="{{$module['tittle']}}"/>
            </div>
        @endempty
    </div>
</section>
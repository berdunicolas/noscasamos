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
        @empty(!$module->data["tittle"])
            <div class="text">
                @empty(!$module->data['text'])
                    @if($icontype==='Animado')
                        <lord-icon src="https://cdn.lordicon.com/{{$module->data['icon']}}.json" trigger="{{$trigger}}" state="{{$bienvenidaicons}}" stroke="{{$stroke}}" delay="500" colors="primary:{{($style=="dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$module->data['icon']}}"></i>
                    @endif
                @endempty
                @empty(!$module->data['tittle'])
                    <h2>{{$module->data['tittle']}}</h2>
                @endempty
                <p>{!!$module->data['text']!!}</p>
                <!--                    <a href="#">Ver más</a>-->
            </div>
        @endempty

        @empty(!$module->data['image'])
            <div class="image">
                <img src="{{$module->data['image']}}" alt="{{$module->data['tittle']}}"/>
            </div>
        @endempty
    </div>
</section>
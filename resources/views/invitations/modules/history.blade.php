@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold


$historiaicons = "hover-heartbeat-alt";

@endphp

<section class="story">
    @empty(!$module->data['image'])
        <div class="image wow animate__animated animate__fadeInLeft">
            <img src="{{$module->data['image']}}" alt="{{$module->data['tittle']}}"/>
        </div>
    @endempty
    @empty(!$module->data['text'])
    <div class="text wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
        @empty(!$module->data['icon'])
            @if($icontype==='Animado')
                <lord-icon src="https://cdn.lordicon.com/{{$module->data['icon']}}.json" trigger="{{$trigger}}" state="{{$historiaicons}}" stroke="{{$stroke}}" delay="300" colors="primary:#fff,secondary:#fff" style="width:70px;height:70px"></lord-icon>                
            @else
                <i class="fa-thin {{empty($module->data['icon']) ? 'fa-heart' : $module->data['icon']}}"></i>
            @endif
        @endempty
        @empty(!$module->data['tittle'])
            <h2>{{$module->data['tittle']}}</h2>
        @endempty
        <p>{!!$module->data['text']!!}</p>
        <!--<a href="#">Ver más</a>-->
    </div>
    @endempty
</section>

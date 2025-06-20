@php
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$destacadoicons = "hover-heartbeat-alt";

@endphp

<section class="content full" style="background-image:url('{{$module->data['image']}}');">
    <div class="info">
        <div class="text wow animate__animated animate__fadeInUp">
            @empty(!$module->data['icon'])
                @if($icontype==='Animado')
                    <lord-icon src="https://cdn.lordicon.com/{{$module->data['icon']}}.json" trigger="{{$trigger}}" state="{{$destacadoicons}}" stroke="{{$stroke}}" delay="500" colors="primary:#fff,secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$module->data['icon']}}"></i>
                @endif
            @endempty
                    
            @empty(!$module->data['tittle'])
                <h2>{!!$module->data['tittle']!!}</h2>
            @endempty
            <p>{!!$module->data['text']!!}</p>
<!--          <a href="#">Ver más</a>-->
        </div>
    </div>
</section>

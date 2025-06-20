@php
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$sugerenciasicons = '';
@endphp


<section class="hotels wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding-top:'.$padding.'px; padding-bottom:'.$padding.'px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    @empty(!$module->data['icon'])
        @if($icontype==='Animado')
            <lord-icon src="https://cdn.lordicon.com/{{$module->data['icon']}}.json" trigger="{{$trigger}}" state="{{$sugerenciasicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="Dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
        @else
            <i class="fa-thin {{$module->data['icon']}}"></i>
        @endif
    @endempty
    <br/>
    @empty(!$module->data['pre_tittle'])
        <span>{{$module->data['pre_tittle']}}</span>
    @endempty
    @empty(!$module->data['tittle'])
        <h2>{{$module->data['tittle']}}</h2>
    @endempty
    @empty(!$module->data['text'])
        <p>{!!$module->data['text']!!}</p>
    @endempty
    <div class="list wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
        @foreach ($suggestions as $key => $suggestion)
            @empty(!$suggestion['suggestion_' . $key+1])
                <a href="https://{{$suggestion['link_' . $key+1]}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$suggestion['suggestion_' . $key+1]}}</a>
            @endempty    
        @endforeach
    </div>
</section>
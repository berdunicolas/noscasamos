@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold
$inter1icons = "s";

@endphp


@if($interactives['spotify']['active'] || $interactives['hashtag']['active'] || $interactives['ig']['active'] || $interactives['link']['active'])
    <section class="social" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
        @foreach ($interactives as $key => $interactive)
            @if($interactive['active'])
                <article class="item wow animate__animated animate__fadeInUp">
                    @empty(!$interactive['icon'])
                        @if($icontype==='Animado')
                            <lord-icon src="https://cdn.lordicon.com/{{$interactive['icon']}}.json" trigger="{{$trigger}}" state="{{$inter1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="Dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
                        @else
                            <i class="fa-brands {{$interactive['icon']}}"></i>
                        @endif
                    @endempty
                            
                    @empty(!$interactive['tittle'])
                        <h2>{!!$interactive['tittle']!!}</h2>
                    @endempty
                    @empty(!$interactive['text'])
                    <div>
                        <p>{!!$interactive['text']!!}</p>
                    </div>
                    @endempty
                    @empty(!$interactive['button_url'])
                        <a href="https://{{$interactive['button_url']}}" target="_blank">{{$interactive['button_text']}}</a>
                    @endempty
                </article>
            @endif
        @endforeach
    </section>
@endif
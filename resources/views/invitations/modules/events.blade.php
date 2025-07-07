@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$evento1 = "s"; // s = Si
$evento1titulo = "Civil";
$evento1icons = "";
$evento1iconf = "fa-rings-wedding";
$evento1icon = "czmrowis";

@endphp

@if($events['civil']['active'] || $events['ceremony']['active'] || $events['party']['active'] || $events['dresscode']['active'])
    <section class="events" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    @foreach ($events as $key => $event)
        @if($event['active'])
            <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                @if(!empty($event['icon']))
                    @if($icontype==='Animado')
                        <lord-icon src="https://cdn.lordicon.com/{{$event['icon']}}.json" trigger="{{$trigger}}" state="{{$evento1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="Dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$event['icon']}}"></i>
                    @endif
                @endif
                @if($event['use_image'])
                    <img src="{{$event['image']}}" alt="{{$event['event']}}"/>
                @endif
                
                <h2>{{$event['event']}}</h2>
                <div>
                    @if (isset($event['date']))    
                    @if(!empty($event['date']) || !empty($event['time']))
                    <div class="txt" style="{{(!empty($event['name']) || !empty($event['detail'])) ? 'border-bottom: 1px solid rgba(135, 135, 135, 0.2); margin-bottom:15px; padding-bottom:15px;' : ''}}">
                        @if(!empty($event['day']))
                            <div class="date">
                                <p>{{$event['day']}}</p>
                                <span>{{$event['month']}}</span>
                            </div>
                        @endif
                        
                        @if(!empty($event['date']) || !empty($event['time']))
                            <div class="line"></div>
                        @endif
                        
                        @if(!empty($event['time']))
                        <div class="date">
                            <p>{{$event['time']}}</p>
                            <span>{{$event['hr_translation']}}</span>
                        </div>
                        @endif
                    </div>
                    @endif
                    @endif
                    @if(!empty($event['name']) || !empty($event['detail']))
                    <div class="place">
                        <p><b>{{$event['name']}}</b></p>
                        <p>{{$event['detail']}}</p>
                    </div>
                    @endif
                </div>
                
                @empty(!$event['button_text'])
                    <a href="https://{{$event['button_url']}}" target="_blank">{{$event['button_text']}}</a>
                @endempty
            </article>
        @endif
    @endforeach
    </section>
@endif
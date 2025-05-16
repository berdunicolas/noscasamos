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
                @else
                    <img src="images/{{$event['image']}}" alt="{{$event['event']}}"/>
                @endif
                
                <h2>{{$event['event']}}</h2>
                <div>
                    @if(!empty($event['date']) || !empty($event['time']))
                    <div class="txt" style="{{(!empty($event['name']) || !empty($event['detail'])) ? 'border-bottom: 1px solid rgba(135, 135, 135, 0.2); margin-bottom:15px; padding-bottom:15px;' : ''}}">
                        @if(!empty($evento1dia))
                            <div class="date">
                                <p>{{$evento1dia}}</p>
                                <span>{{$evento1mes}}</span>
                            </div>
                        @endif
                        
                        @if(!empty($evento1dia) && !empty($evento1hs))
                            <div class="line"></div>
                        @endif
                        
                        @if(!empty($evento1hs))
                        <div class="date">
                            <p>{{$evento1hs}}</p>
                            <span>{{$evento1hstxt}}</span>
                        </div>
                        @endif
                    </div>
                    @endif
                    @if(!empty($event['name']) || !empty($event['detail']))
                    <div class="place">
                        <p><b>{{$event['name']}}</b></p>
                        <p>{{$event['detail']}}</p>
                    </div>
                    @endif
                </div>
                
                @empty(!$event['button_text'])
                    <a href="{{$event['button_url']}}" target="_blank">{{$event['button_text']}}</a>
                @endempty
            </article>
        @endif
    @endforeach





<!-- EVENTO 1 -->        
{{-- 
    @if($evento1 == "s")
        <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s">
            @if(!empty($evento1icon))
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$evento1icon}}.json" trigger="{{$trigger}}" state="{{$evento1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$evento1iconf}}"></i>
                @endif
            @else
                    <img src="images/{{$evento1img}}" alt="{{$evento1titulo}}"/>
            @endif
            
            <h2>{{$evento1titulo}}</h2>
            <div>
                @if(!empty($evento1dia) || !empty($evento1hs))
                <div class="txt" style="{{(!empty($evento1lugar) || !empty($evento1info)) ? 'border-bottom: 1px solid rgba(135, 135, 135, 0.2); margin-bottom:15px; padding-bottom:15px;' : ''}}">
                    @if(!empty($evento1dia))
                    <div class="date">
                        <p>{{$evento1dia}}</p>
                        <span>{{$evento1mes}}</span>
                    </div>
                    @endif
                    
                    @if(!empty($evento1dia) && !empty($evento1hs))
                    <div class="line"></div>
                    @endif
                    
                    @if(!empty($evento1hs))
                    <div class="date">
                        <p>{{$evento1hs}}</p>
                        <span>{{$evento1hstxt}}</span>
                    </div>
                    @endif
                </div>
                @endif
                @if(!empty($evento1lugar) || !empty($evento1info))
                <div class="place">
                    <p><b>{{$evento1lugar}}</b></p>
                    <p>{{$evento1info}}</p>
                </div>
                @endif
            </div>
            @empty(!$evento1btn)
                <a href="{{$evento1link}}" target="_blank">{{$evento1btn}}</a>
            @endempty
        </article>
    @endif

<!-- EVENTO 2 -->         
    @if($evento2 == "s")
        <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
            @if(!empty($evento2icon))
                @if ($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$evento2icon}}.json" trigger="{{$trigger}}" state="{{$evento2icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$evento2iconf}}"></i>
                @endif
            @else
                <img src="images/{{$evento2img}}" alt="{{$evento2titulo}}"/>
            @endif
            <h2>{{$evento2titulo}}</h2>
            <div>
                @if(!empty($evento2dia) || !empty($evento2hs))
                <div class="txt" style="{{(!empty($evento2lugar) || !empty($evento2info)) ? 'border-bottom: 1px solid rgba(135, 135, 135, 0.2); margin-bottom:15px; padding-bottom:15px;' : ''}}">
                    @empty(!$evento2dia)
                    <div class="date">
                        <p>{{$evento2dia}}</p>
                        <span>{{$evento2mes}}</span>
                    </div>
                    @endempty
                    
                    @if(!empty($evento2dia) && !empty($evento2hs))
                    <div class="line"></div>
                    @endif
                    
                    @empty(!$evento2hs)
                    <div class="date">
                        <p>{{$evento2hs}}</p>
                        <span>{{$evento2hstxt}}</sapn>
                    </div>
                    @endempty
                </div>
                @endif
                @if(!empty($evento2lugar) || !empty($evento2info))
                <div class="place">
                    <p><b>{{$evento2lugar}}</b></p>
                    <p>{{$evento2info}}</p>
                </div>
                @endif
            </div>
            @empty(!$evento2btn)
                <a href="{{$evento2link}}" target="_blank">{{$evento2btn}}</a>
            @endempty
        </article>
    @endif

<!-- EVENTO 3 -->         
    @if($evento3 == "s")
        <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            @if (!empty($evento3icon))
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$evento3icon}}.json" trigger="{{$trigger}}" state="{{$evento3icons}}" stroke="{{$stroke}}" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin{{$evento3iconf}}"></i>
                @endif
            @else
                <img src="images/{{$evento3img}}" alt="{{$evento3titulo}}"/>
            @endempty
            <h2>{{$evento3titulo}}</h2>
            <div>
                @if(!empty($evento3dia) || !empty($evento3hs))
                <div class="txt" style="{{(!empty($evento3lugar) || !empty($evento3info)) ? 'border-bottom: 1px solid rgba(135, 135, 135, 0.2); margin-bottom:15px; padding-bottom:15px;' : ''}}">
                    @empty(!$evento3dia)
                    <div class="date">
                        <p>{{$evento3dia}}</p>
                        <span>{{$evento3mes}}</span>
                    </div>
                    @endempty
                    
                    @if(!empty($evento3dia) && !empty($evento3hs))
                    <div class="line"></div>
                    @endif
                    
                    @empty(!$evento3hs)
                    <div class="date">
                        <p>{{$evento3hs}}</p>
                        <span>{{$evento3hstxt}}</span>
                    </div>
                    @endempty
                </div>
                @endif
                @if(!empty($evento3lugar) || !empty($evento3info))
                <div class="palce">
                    <p><b>{{$evento3lugar}}</b></p>
                    <p>{{$evento3info}}</p>
                </div>
                @endif
            </div>
            @empty(!$evento3btn)
                <a href="{{$evento3link}}" target="_blank">{{$evento3btn}}</a>
            @endempty
        </article>
    @endif

        
<!-- DRESS CODE -->   

    @if($dresscode == "s")
        <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
           @if(!empty($dresscodeicon))
                @if ($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$dresscodeicon}}.json" trigger="{{$trigger}}" state="{{$evento3icons}}" stroke="{{$stroke}}"  colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$dresscodeiconf}}"></i>
                @endif
            @else
                <img src="images/dresscode.png" alt="{{$dresscodetitulo}}"/>
            @endif
            <h2>{{$dresscodetitulo}}</h2>
            <div>
                <p><b>{{$dresscodetxt}}</b></p><br/>
                <p>{{$dresscodeinfo}}</p>
            </div>
            @empty(!$dresscodebtn)
                <a href="{{$dresscodelink}}" target="_blank">{{$dresscodebtn}}</a>
            @endempty
        </article>
    @endi
    --}}
    </section>
@endif
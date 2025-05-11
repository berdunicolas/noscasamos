@php
$dia = "29";
$mes = "12";
$mestxt = "Diciembre";
$ano = "2025";
$hs = "20:00:00";

$pcolor = "#E2BF83"; //Color Principal//
$bcolor = "#F6F4F0"; //Color de Fondo//
$style = "c"; //c = Claro o = Oscuro//
//$font = $clasic; //Estilo de Texto//
$icontype = "a"; // Tipo de icono a = Animado
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$evento1 = "s"; // s = Si
$evento1titulo = "Civil";
$evento1icons = "";
$evento1iconf = "fa-rings-wedding";
$evento1icon = "czmrowis";
$evento1img = "evento1.png";
$evento1dia = "28"; // Vacío oculta la fecha
$evento1mes = $mestxt;
$evento1hs = "17:00"; // Vacío oculta la hora
$evento1hstxt = "Horas";
$evento1lugar = "Registro Civil de Palermo"; // Vació oculta dirección
$evento1info = "";
$evento1btn = "Cómo llegar";
$evento1link = "https://maps.google.com"; //Link del boton

$evento2 = "s"; // s = Si
$evento2titulo = "Ceremonia";
$evento2icons = "";
$evento2iconf = "fa-church";
$evento2icon = "fshosubk";
$evento2img = "evento2.png";
$evento2dia = $dia; // Vacío oculta la fecha
$evento2mes = $mestxt;
$evento2hs = "20:00"; // Vacío oculta la hora
$evento2hstxt = "Horas";
$evento2lugar = "Parroquia Nuestra Señora del Rosario"; // Vació oculta dirección
$evento2info = "Bonpland 1987, Buenos Aires";
$evento2btn = "Cómo llegar";
$evento2link = "https://maps.google.com"; //Link del boton

$evento3 = "s"; // s = Si
$evento3titulo = "Festejo";
$evento3icons = "";
$evento3iconf = "fa-champagne-glasses"; 
$evento3icon = "ohcuigqh"; // Copas: yvgmrqny - Fiesta: ohcuigqh
$evento3img = "evento3.png";
$evento3dia = $dia; // Vacío oculta la fecha
$evento3mes = $mestxt;
$evento3hs = "21:00"; // Vacío oculta la hora
$evento3hstxt = "Horas";
$evento3lugar = "Howard Jonson"; // Vació oculta dirección
$evento3info = "Av. Figueroa Alcorta 5575, BsAs.";
$evento3btn = "Cómo llegar";
$evento3link = "https://maps.google.com"; //Link del boton

$dresscode = "s"; // s = Si
$dresscodetitulo = "Dress Code";
$dresscodeicons = "";
$dresscodeiconf = "fa-clothes-hanger";
$dresscodeicon = "dkyhucjt";
$dresscodeimg = "dresscode.png";
$dresscodetxt = "Formal - Elegante";
$dresscodeinfo = "El Blanco queda reservado para La Novia";
$dresscodebtn = "";
$dresscodelink = "http://www.google.com";

$eventosmarco = $marco;

$eventosIcons = [
    'civil' => [
        'conf' => "fa-rings-wedding",
        'icon' => "czmrowis"
    ],
    'ceremony' => [
        'conf' => "fa-church",
        'icon' => "fshosubk"
    ],
    'party' => [
        'conf' => "fa-champagne-glasses",
        'icon' => "ohcuigqh"
    ],
    'dresscode' => [
        'conf' => "fa-clothes-hanger",
        'icon' => "dkyhucjt"
    ],
];

@endphp


@if($events['civil']['active'] || $events['ceremony']['active'] || $events['party']['active'] || $events['dresscode']['active'])
    <section class="events" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}}{{(!empty($eventosmarco)) ? "background-image: url('images/".$eventosmarco."');" : ''}} background-repeat:repeat-x;">
    @foreach ($events as $key => $event)
        @if($event['active'])
            <article class="item wow animate__animated animate__fadeInUp" data-wow-duration="1s">
                @if(!empty($event['icon']))
                    @if($icontype==='a')
                        <lord-icon src="https://cdn.lordicon.com/{{$eventosIcons[$key]['icon']}}.json" trigger="{{$trigger}}" state="{{$evento1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
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
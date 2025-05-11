@php

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

$inter1 = "s"; // s = Si o n = No //
$inter1icons = "";
$inter1iconf = "fa-spotify";
$inter1icon = "xsiktwiz";
$inter1titulo = "Nuestra Playlist";
$inter1txt = "Agrega nuestra playlist y recomendá las canciones que no pueden faltar en nuestra boda";
$inter1btn = "Ir a Spotify";
$inter1link = "https://open.spotify.com/playlist/76enN7Gwvt3IP0IPIEkZON?si=uLjHUPcVSsGJmx0X7C_89A";

$inter2 = "s"; // s = Si o n = No //
$inter2icons = "s";
$inter2iconf = "fa-instagram";
$inter2icon = "tgyvxauj";
$inter2titulo = "#NosCasamos";
$inter2txt = "Sumate a la boda compartiendo fotos y videos con nuestro hashtag.";
$inter2btn = "Ir a Instagram";
$inter2link = "https://www.instagram.com/explore/tags/noscasamos/";

$inter3 = ""; // s = Si o n = No //
$inter3icons = "hover-draw";
$inter3iconf = "fa-whatsapp";
$inter3icon = "dnphlhar";
$inter3titulo = "";
$inter3txt = "";
$inter3btn = "";
$inter3link = "";

$interactivosmarco = $marco;

@endphp


@if($interactives['spotify']['active'] || $interactives['hashtag']['active'] || $interactives['ig']['active'] || $interactives['link']['active'])
    <section class="social" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{(!empty($interactivosmarco)) ? "background-image: url('images/".$interactivosmarco."')" : ''}} background-repeat:repeat-x;">
        @foreach ($interactives as $key => $interactive)            
            @if($interactive['active'])
                <article class="item wow animate__animated animate__fadeInUp">
                    @empty(!$interactive['icon'])
                        @if($icontype==='a')
                            <lord-icon src="https://cdn.lordicon.com/{{$inter1icon}}.json" trigger="{{$trigger}}" state="{{$inter1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                        @else
                            <i class="fa-brands {{$interactive['icon']}}"></i>
                        @endif
                    @endempty
                            
                    @empty(!$interactive['tittle'])
                        <h2>{{$interactive['tittle']}}</h2>
                    @endempty
                    @empty(!$interactive['text'])
                    <div>
                        <p>{!!$interactive['text']!!}</p>
                    </div>
                    @endempty
                    @empty(!$interactive['button_url'])
                        <a href="{{$interactive['button_url']}}" target="_blank">{{$interactive['button_text']}}</a>
                    @endempty
                </article>
            @endif
        @endforeach
    </section>
@endif

{{--
@if ($inter1 == "s" || $inter2 == "s" || $inter3 == "s")
    <section class="social" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{(!empty($interactivosmarco)) ? "background-image: url('images/".$interactivosmarco."')" : ''}} background-repeat:repeat-x;">
        @if($inter1 == "s")
        <article class="item wow animate__animated animate__fadeInUp">
            @empty(!$inter1icon)
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$inter1icon}}.json" trigger="{{$trigger}}" state="{{$inter1icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-brands {{$inter1iconf}}"></i>
                @endif
            @endempty
                    
            @empty(!$inter1titulo)
                <h2>{{$inter1titulo}}</h2>
            @endempty
            @empty(!$inter1txt)
            <div>
                <p>{{$inter1txt}}</p>
            </div>
            @endempty
            @empty(!$inter1link)
                <a href="{{$inter1link}}" target="_blank">{{$inter1btn}}</a>
            @endempty
        </article>
        @endif
        
        @if($inter2 == "s")
            <article class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                @empty(!$inter2icon)
                    @if ($icontype==='a')
                        <lord-icon src="https://cdn.lordicon.com/{{$inter2icon}}.json" trigger="{{$trigger}}" state="{{$inter2icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-brands {{$inter2iconf}}"></i>
                    @endif
                @endempty
                        
                @empty(!$inter2titulo)
                    <h2>{{$inter2titulo}}</h2>
                @endempty
                @empty(!$inter2txt)
                <div>
                    <p>{{$inter2txt}}</p>
                </div>
                @endempty
                @empty(!$inter2link)
                    <a href="{{$inter2link}}" target="_blank">{{$inter2btn}}</a>
                @endempty
            </article>
        @endif
        
        @if($inter3 == "s")
        <article class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
            @empty(!$inter3icon)
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$inter3icon}}.json" trigger="{{$trigger}}" state="{{$inter3icons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-brands {{$inter3iconf}}"></i>
                @endif
            @endempty
            @empty(!$inter3titulo)
                <h2>{{$inter3titulo}}</h2>
            @endempty
            @empty(!$inter3txt)
            <div>
                <p>{{$inter3txt}}</p>
            </div>
            @endempty
            @empty(!$inter3link)
                    <a href="{{$inter3link}}" target="_blank">{{$inter3btn}}</a>
            @endempty
        </article>
        @endif
    </section>
@endif

--}}
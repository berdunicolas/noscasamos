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

$sugerencias = "s"; // s = Si o n = No //

$sugerenciasantetitulo = "Sugerencias";
$sugerenciastitulo = "Puntos de interés";
$sugerenciastxt = "¿Estarás de visita en la ciudad?<br> Te recomendamos algunos lugares para visitar y hospedarte";
$sugerenciasicons = "";
$sugerenciasiconf = "fa-signs-post";
$sugerenciasicon = "kjeyqivm";

$sugerencia1 = "Sheraton Hotel";
$sugerencialink1 = "";
$sugerencia2 = "Miravida Soho Hotel";
$sugerencialink2 = "";
$sugerencia3 = "Magnolia Hotel Boutique";
$sugerencialink3 = "";
$sugerencia4 = "Mine Hotel Boutique";
$sugerencialink4 = "";
$sugerencia5 = "Rendez Vous Hotel";
$sugerencialink5 = "";
$sugerencia6 = "The Glu Hotel";
$sugerencialink6 = "";
$sugerencia7 = "";
$sugerencialink7 = "";
$sugerencia8 = "";
$sugerencialink8 = "";
$sugerencia9 = "";
$sugerencialink9 = "";
$sugerencia10 = "";
$sugerencialink10 = "";
$sugerencia11 = "";
$sugerencialink11 = "";
$sugerencia12 = "";
$sugerencialink12 = "";

$sugerenciasmarco = $marco;
@endphp


<section class="hotels wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding-top:'.$padding.'px; padding-bottom:'.$padding.'px;' : ''}} {{(!empty($sugerenciasmarco)) ? "background-image: url('images/".$sugerenciasmarco."');" : ''}} background-repeat:repeat-x;">
    @empty(!$module['icon'])
        @if($icontype==='a')
            <lord-icon src="https://cdn.lordicon.com/{{$sugerenciasicon}}.json" trigger="{{$trigger}}" state="{{$sugerenciasicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
        @else
            <i class="fa-thin {{$module['icon']}}"></i>
        @endif
    @endempty
    <br/>
    @empty(!$module['pre_tittle'])
        <span>{{$module['pre_tittle']}}</span>
    @endempty
    @empty(!$module['tittle'])
        <h2>{{$module['tittle']}}</h2>
    @endempty
    @empty(!$module['text'])
        <p>{!!$module['text']!!}</p>
    @endempty
    <div class="list wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
        @foreach ($module['suggestions'] as $key => $suggestion)
            @empty(!$suggestion['suggestion_' . $key+1])
                <a href="{{$suggestion['link_' . $key+1]}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$suggestion['suggestion_' . $key+1]}}</a>
            @endempty    
        @endforeach
    </div>
</section>
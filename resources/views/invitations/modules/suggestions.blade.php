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



@if($sugerencias == "s")
    <section class="hotels wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding-top:'.$padding.'px; padding-bottom:'.$padding.'px;' : ''}} {{(!empty($sugerenciasmarco)) ? "background-image: url('images/".$sugerenciasmarco."');" : ''}} background-repeat:repeat-x;">
        @empty(!$sugerenciasicon)
            @if($icontype==='a')
                <lord-icon src="https://cdn.lordicon.com/{{$sugerenciasicon}}.json" trigger="{{$trigger}}" state="{{$sugerenciasicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$sugerenciasiconf}}"></i>
            @endif
        @endempty
        <br/>
        @empty(!$sugerenciasantetitulo)
            <span>{{$sugerenciasantetitulo}}</span>
        @endempty
        @empty(!$sugerenciastitulo)
            <h2><?php echo $sugerenciastitulo; ?></h2>
        @endempty
        @empty(!$sugerenciastxt)
            <p>{{$sugerenciastxt}}</p>
        @endempty
        <div class="list wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
            @empty(!$sugerencia1)
                <a href="{{$sugerencialink1}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia1}}</a>
            @endempty    
            @empty(!$sugerencia2)
                <a href="{{$sugerencialink2}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia2}}</a>
            @endempty    
            @empty(!$sugerencia3)
                <a href="{{$sugerencialink3}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia3}}</a>
            @endempty    
            @empty(!$sugerencia4)
                <a href="{{$sugerencialink4}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia4}}</a>
            @endempty    
            @empty(!$sugerencia5)
                <a href="{{$sugerencialink5}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia5}}</a>
            @endempty    
            @empty(!$sugerencia6)
                <a href="{{$sugerencialink6}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia6}}</a>
            @endempty    
            @empty(!$sugerencia7)
                <a href="{{$sugerencialink7}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia7}}</a>
            @endempty    
            @empty(!$sugerencia8)
                <a href="{{$sugerencialink8}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia8}}</a>
            @endempty    
            @empty(!$sugerencia9)
                <a href="{{$sugerencialink9}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia9}}</a>
            @endempty    
            @empty(!$sugerencia10)
                <a href="{{$sugerencialink10}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia10}}</a>
            @endempty    
            @empty(!$sugerencia11)
                <a href="{{$sugerencialink11}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia11}}</a>
            @endempty    
            @empty(!$sugerencia12)
                <a href="{{$sugerencialink12}}" target="_blank"><i class="fa-regular fa-map-marker-alt"></i>{{$sugerencia12}}</a>
            @endempty    
        </div>
    </section>
@endif
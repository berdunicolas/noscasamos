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

$icontype = "a";
$destacado = "s"; // s = Si o n = No //
$destacadotitulo = "La medida del amor es amar sin medida";
$destacadotxt = "San Agustín";
$destacadoicons = "hover-heartbeat-alt";
$destacadoiconf = "fa-heart";
$destacadoicon = "";
$destacadoimg = "destacada.jpg";

@endphp

<section class="content full" style="background-image:url('{{$module['image']}}');">
    <div class="info">
        <div class="text wow animate__animated animate__fadeInUp">
            @empty(!$module['icon'])
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$destacadoicon}}.json" trigger="{{$trigger}}" state="{{$destacadoicons}}" stroke="{{$stroke}}" delay="500" colors="primary:#fff,secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$module['icon']}}"></i>
                @endif
            @endempty
                    
            @empty(!$module['tittle'])
                <h2>{{$module['tittle']}}</h2>
            @endempty
            <p>{!!$module['text']!!}</p>
<!--          <a href="#">Ver más</a>-->
        </div>
    </div>
</section>

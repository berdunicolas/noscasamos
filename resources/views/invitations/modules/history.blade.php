@php

$pcolor = "#E2BF83"; //Color Principal//
$bcolor = "#F6F4F0"; //Color de Fondo//
$style = "c"; //c = Claro o = Oscuro//
$icontype = "a"; // Tipo de icono a = Animado
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$historia = "s"; // s = Si o n = No //
$historiatitulo = "Nuestra Historia";
$historiatxt = "Dicen que todos los caminos conducen a Roma. Como los nuestros, que un día de Septiembre hace algunos años, con una selfie y un desayuno dieron como resultado atardeceres en la playa y el comienzo de un amor de verano.<br><br>
Luego vinieron viajes, muchas risas, una mudanza, momentos compartidos en familia y aventuras con amigos. Un amor de verano que se transformó en uno para toda la vida";
$historiaicons = "hover-heartbeat-alt";
$historiaiconf = "fa-heart";
$historiaicon = "aydxrkfl";
$historiaimg = "historia.jpg";
@endphp

@if($historia == "s")
    <section class="story">
        @empty(!$historiaimg)
            <div class="image wow animate__animated animate__fadeInLeft">
                <img src="{{asset("boda/images/".$historiaimg)}}" alt="{{$historiatitulo}}"/>
            </div>
        @endempty
        @empty(!$historiatxt)
        <div class="text wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
            
            @empty(!$historiaicon)
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$historiaicon}}.json" trigger="{{$trigger}}" state="{{$historiaicons}}" stroke="{{$stroke}}" delay="300" colors="primary:#fff,secondary:#fff" style="width:70px;height:70px"></lord-icon>                @else
                    <i class="fa-thin {{$historiaiconf}}"></i>
                @endif
            @endempty
            @empty($historiatitulo)
                <h2>{{$historiatitulo}}</h2>
            @endempty
            <p>{!!$historiatxt!!}</p>
            <!--<a href="#">Ver más</a>-->
        </div>
        @endempty
    </section>
@endif
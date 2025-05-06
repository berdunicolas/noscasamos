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


$info = "s"; // s = Si o n = No //
$infoderecha = "s"; // s = Texto a la derecha
$infotitulo = "Wedding Timeline";
$infotxt = "";
$infoicons = "hover-heartbeat-alt";
$infoiconf = "fa-heart";
$infoicon = "warimioc"; // Corazon: aydxrkfl - Reloj: warimioc
$infoimg = "timeline.svg";
$infomarco = $marco;
@endphp


@if($info == "s")
    <section class="content wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{(!empty($infomarco)) ? "background-image: url('images/".$infomarco."');" : ""}} background-repeat:repeat-x;">
        <div class="info" style="padding:50px 0px;">
        @if(!empty($infoimg) && empty($infoderecha))
            <div class="image wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <img src="images/{{$infoimg}}" alt="{{$infotitulo}}"/>
            </div>
        @endif
            
        @if (!empty($infotitulo))
            <div class="text wow animate__animated animate__fadeInUp">
                @empty(!$infoicon)
                    @if($icontype==='a')
                        <lord-icon src="https://cdn.lordicon.com/{{$infoicon}}.json" trigger="{{$trigger}}" state="{{$infoicons}}" stroke="{{$stroke}}" delay="500" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$infoiconf}}"></i>
                    @endif
                @endempty
                        
                
                    <h2>{{$infotitulo}}</h2>
                
                @empty(!$infotxt)
                <p>{{$infotxt}}</p>
                @endempty
            </div>
        @endif   
        @if (!empty($infoimg) && $infoderecha=="s")
            <div class="image wow animate__animated animate__fadeInUp">
                <img src="images/{{$infoimg}}" alt="{{$infotitulo}}"/>
            </div>
        @endif
        </div>
    </section>
@endif
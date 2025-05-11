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

$galeria = "s"; // s = Si o n = No//
$galeriaicons = "hover-flash";
$galeriaiconf = "fa-camera-retro";
$galeriaicon = "wsaaegar";
$galeriaantetitulo = "Álbum de Fotos";
$galeriatitulo = "Momentos únicos";
$galeriamarco = $marco;
@endphp


@if($galeria == "s")
    <section class="gallery" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} {{(!empty($galeriamarco)) ? "background-image: url('images/".$galeriamarco."');" : ''}} background-repeat:repeat-x;">
        @empty(!$galeriaicon)
            @if($icontype==='a')
                <lord-icon class="wow animate__animated animate__fadeInUp icon" data-wow-duration="1s" src="https://cdn.lordicon.com/{{$galeriaicon}}.json" trigger="{{$trigger}}" state="{{$galeriaicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$galeriaiconf}} wow animate__animated animate__fadeInUp" data-wow-duration="1s"></i>
            @endif
        @endempty
        <br/>
        @empty(!$galeriaantetitulo)
            <span class="wow animate__animated animate__fadeInUp" data-wow-duration="1s">{{$galeriaantetitulo}}</span>
        @endempty
        @empty(!$galeriatitulo)
            <h2 class="wow animate__animated animate__fadeInUp" data-wow-duration="1s">{{$galeriatitulo}}></h2>
        @endempty
        <div class="wall">
            @php
                $num = 1;
            @endphp
            @foreach ($module['galery_images'] as $key => $image)
                <div class="image wow animate__animated animate__fadeInUp" data-wow-duration="1s"><img onclick="openModal(); currentSlide('{{$num++}}')" src="{{$image}}" border="0" /></div>
            @endforeach
        </div>
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()"><i class="fa-thin fa-times"></i></span>
            <div class="modal-content">
                
                @foreach($module['galery_images'] as $image)
                    <div class="mySlides"><img src="{{$image}}" border="0" /></div>
                @endforeach
                
            </div>
            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-thin fa-angle-left"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-thin fa-angle-right"></i></a>
            <div class="layer" onclick="closeModal()"></div>
        </div>
    </section>
@endif
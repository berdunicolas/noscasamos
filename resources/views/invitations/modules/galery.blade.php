@php
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$galeriaicons = "hover-flash";
$galeriaiconf = "fa-camera-retro";
$galeriaicon = "wsaaegar";
@endphp


<section class="gallery" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    @empty(!$module['icon'])
        @if($icontype==='Animado')
            <lord-icon class="wow animate__animated animate__fadeInUp icon" data-wow-duration="1s" src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$galeriaicons}}" stroke="{{$stroke}}" delay="300" colors="primary:{{($style=="Dark") ? '#fff' : '#666'}},secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
        @else
            <i class="fa-thin {{$module['icon']}} wow animate__animated animate__fadeInUp" data-wow-duration="1s"></i>
        @endif
    @endempty
    <br/>
    @empty(!$module['pre_tittle'])
        <span class="wow animate__animated animate__fadeInUp" data-wow-duration="1s">{{$module['pre_tittle']}}</span>
    @endempty
    @empty(!$module['tittle'])
        <h2 class="wow animate__animated animate__fadeInUp" data-wow-duration="1s">{{$module['tittle']}}></h2>
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
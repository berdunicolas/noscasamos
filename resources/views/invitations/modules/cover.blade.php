@php
    //$nombres = "Flor y Santi";

    /////

    $portada = "vv"; //ff = Full Foto - dd = Full Diseño - f = Foto - d = Diseño v = Video vv = Video Central //
    $header = "n"; // s = Mostrar header en diseños full

    $logo = ""; // Ej: logo.svg / n = No muestra nada. / Vacío = Muestra nombres
    $central = ""; // Ej: central.png / n = No muestra nada. / Vacío = Muestra titulo y bajada
    $videoportada = "video";

    $titulo = "¡Nos Casamos!";
    $bajada = "y queremos compartirlo con vos.";
@endphp


@switch($module['format'])
    @case("Video")
        @if($module['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module['logo_cover']))
                <img src="{{$module['logo_cover']}}"/>
            @else 
                <h1 style="color:{{$module['text_color_cover']}}">{{$module['names']}}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full">
            <div class="text">
                
                @if (!$module['active_header'])
                    @if (!empty ($module['logo_cover'])) 
                        @if ($module['active_logo'])
                            <img src='{{$module['logo_cover']}}'/>
                        @endif
                    @else 
                    <h1>{{$module['names']}}</h1>
                    @endif
                @endif
                
                @if (!empty ($module['central_image_cover']))
                    @if ($module['active_central'])
                        <img src='{{$module['central_image_cover']}}'/>
                    @endif
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['detail']}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="{{(isMobile()) ? $module['mobile_video'] : $module['desktop_video']}}" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("Video centrado")
        @if($module['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module['logo_cover']))
                <img src='{{$module['logo_cover']}}'/>
            @else 
                <h1 style="color:{{$module['text_color_cover']}}">{{$module['names']}}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full">
            <div class="text">
                
                @if (!$module['active_header'])
                    @if (!empty ($module['logo_cover'])) 
                        @if ($module['active_logo'])
                            <img src='{{$module['logo_cover']}}'/>
                        @endif
                    @else 
                    <h1>{{$module['names']}}</h1>
                    @endif
                @endif
                
                @if (!empty ($module['central_image_cover']))
                    @if ($moduel['active_central'])
                        <img src='{{$module['central_image_cover']}}'/>
                    @endif
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['tittle']}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="{{(isMobile()) ? $module['mobile_video'] : $module['desktop_video']}}" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("Imagenes")
        @if($module['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module['logo_cover']))
                <img src="{{$module['logo_cover']}}"/>
            @else 
                <h1 style="color:{{$module['text_color_cover']}}">{{$module['names']}}</h1>
            @endif
            </header>
        @endif
        <section class="cover full">
            <div class="text">
                
                @if (!$module['active_header'])
                    @if (!empty ($module['logo_cover'])) 
                        @if ($module['active_logo'])
                            <img src='{{$module['logo_cover']}}'/>
                        @endif
                    @else 
                    <h1>{{$module['names']}}</h1>
                    @endif
                @endif
                
                @if (!empty ($module['central_image_cover']))
                    @if ($module['active_central'])
                        <img src='{{$module['central_image_cover']}}'/>
                    @endif
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['detail']}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider" id="slider">
                @if(isMobile())
                    @foreach ($module['mobile_images'] as $image)
                        <div class='image'><img src="{{$image}}"></div>
                    @endforeach
                @else
                    @foreach ($module['desktop_images'] as $image)
                        <div class='image'><img src="{{$image}}"></div>
                    @endforeach
                @endif
            </div>
        </section>
            
        @if (count($module['desktop_images']) > 1) {
            <script src="{{asset("assets/js/slider.js")}}"></script>
        @endif
        @break

    @case("Imagenes con marco")
        
        <header>
            @if (!empty ($module['logo_cover']))
                <img src="{{$module['logo_cover']}}"/>
            @else
                <h1>{{$module['names']}}</h1>
            @endif
        </header>
                
        <section class="cover">
            <div class="text">
            
                @if (!empty ($module['central_image_cover']))
                    @if ($module['active_central'])
                    <img src="{{$module['central_image_cover']}}"/>
                    @endif
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['detail']}}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider" id="slider">
            @if(isMobile())
                @foreach($module['mobile_images'] as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @else
                @foreach($module['desktop_images'] as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @endif
            </div>
        </section>

        @if ($module['desktop_images'] > 1)
        <script src="{{asset("assets/js/slider.js")}}"></script>
        @endif

        @break
    @case("Diseño")
        
        @if($module['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module['logo_cover'])) 
                <img src="{{$module['logo_cover']}}"/> 
            @else
                <h1 style="color:{{$module['text_color_cover']}}">{{$module['names']}}</h1>
            @endif
            </header>
        @endif
            
        <section class="cover full design">
            <div class="text">
            
                @if(!$module['active_header'])
                    @if(!empty($module['logo_cover']))
                        @if($modulo['active_logo'])
                            <img src="{{$module['logo_cover']}}" />
                        @endif
                        
                    @else
                        <h1>{{$module['names']}}</h1>
                    @endif
                @endif
                
                @if(!empty($module['central_image_cover']))
                    @if ($module['active_central'])
                        <img src="{{$module['central_image_cover']}}"/>
                    @endif
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['detail']}}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider">
                <div class="image">
                    @if (isMobile()) {
                        <img src="{{asset("boda/images/designm.jpg")}}"/>
                    @else
                        <img src="{{asset("boda/images/design.jpg")}}"/>
                    @endif
                </div>
            </div>
        </section>
        @break
    @default
        <header>
            @if(!empty ($module['logo_cover']))
                <img src={{$module['logo_cover']}} />
            @else 
                <h1>{{$module['names']}}</h1>
            @endif
        </header>
        <section class="cover design">
            <div class="text">
                @if(!empty ($module['central_image_cover'])) {
                    if ($module['active_central']){
                        <img src="{{$module['central_image_cover']}}" />
                    }
                @else
                    <h2>{{$module['tittle']}}</h2>
                    <p>{{$module['detail']}}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider">
                <div class="image">
                    @if (isMobile())
                        <img src="{{asset("boda/images/designm.jpg")}}"/>
                    @else
                        <img src="{{asset("boda/images/design.jpg")}}"/>
                    @endif
                </div>
            </div>
        </section>
        @break
@endswitch

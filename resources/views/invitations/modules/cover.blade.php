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


@switch($module->data['format'])
    @case("Video")
        @if($module->data['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module->data['logo_cover']) && $module->data['active_logo'])
                <img src="{{$module->data['logo_cover']}}"/>
            @else 
                <h1 style="color:{{$module->data['text_color_cover']}}">{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full">
            <div class="text">
                @if (!$module->data['active_header'])
                    @if (!empty ($module->data['logo_cover']) && $module->data['active_logo']) 
                        <img src='{{$module->data['logo_cover']}}'/>
                    @else 
                        <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
                    @endif
                @endif
                
                @if (!empty ($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src='{{$module->data['central_image_cover']}}'/>
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="{{(isMobile()) ? $module->data['mobile_video'] : $module->data['desktop_video']}}" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("Video centrado")
        @if($module->data['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module->data['logo_cover']) && $module->data['active_logo'])
                <img src='{{$module->data['logo_cover']}}'/>
            @else 
                <h1 style="color:{{$module->data['text_color_cover']}}">{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full design">
            <div class="text">
                
                @if (!$module->data['active_header'])
                    @if (!empty ($module->data['logo_cover']) && $module->data['active_logo']) 
                        <img src='{{$module->data['logo_cover']}}'/>
                    @else 
                        <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
                    @endif
                @endif
                
                @if (!empty ($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src='{{$module->data['central_image_cover']}}'/>
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="{{(isMobile()) ? $module->data['mobile_video'] : $module->data['desktop_video']}}" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("Imagenes")
        @if($module->data['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module->data['logo_cover']) && $module->data['active_logo'])
                <img src="{{$module->data['logo_cover']}}"/>
            @else 
                <h1 style="color:{{$module->data['text_color_cover']}}">{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
            </header>
        @endif
        <section class="cover full">
            <div class="text">
                
                @if (!$module->data['active_header'])
                    @if (!empty ($module->data['logo_cover']) && $module->data['active_logo']) 
                        <img src='{{$module->data['logo_cover']}}'/>
                    @else 
                        <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
                    @endif
                @endif
                
                @if (!empty ($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src='{{$module->data['central_image_cover']}}'/>
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider" id="slider">
                @if(isMobile())
                    @foreach ($module->data['mobile_images'] as $image)
                        <div class='image'><img src="{{$image}}"></div>
                    @endforeach
                @else
                    @foreach ($module->data['desktop_images'] as $image)
                        <div class='image'><img src="{{$image}}"></div>
                    @endforeach
                @endif
            </div>
        </section>
            
        @if (count($module->data['desktop_images']) > 1) 
            <script src="{{asset("assets/js/slider.js")}}"></script>
        @endif
        @break

    @case("Imagenes con marco")
        
        <header>
            @if (!empty ($module->data['logo_cover']) && $module->data['active_logo'])
                <img src="{{$module->data['logo_cover']}}"/>
            @else
                <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
        </header>
                
        <section class="cover">
            <div class="text">
            
                @if (!empty ($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src="{{$module->data['central_image_cover']}}"/>
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider" id="slider">
            @if(isMobile())
                @foreach($module->data['mobile_images'] as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @else
                @foreach($module->data['desktop_images'] as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @endif
            </div>
        </section>

        @if ($module->data['desktop_images'] > 1)
        <script src="{{asset("assets/js/slider.js")}}"></script>
        @endif

        @break
    @case("Diseño")
        
        @if($module->data['active_header'])
            <header style="background-color:{{$backgroundColor}}">
            @if(!empty ($module->data['logo_cover']) && $module->data['active_logo']) 
                <img src="{{$module->data['logo_cover']}}"/> 
            @else
                <h1 style="color:{{$module->data['text_color_cover']}}">{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
            </header>
        @endif
            
        <section class="cover full design">
            <div class="text">
            
                @if(!$module->data['active_header'])
                    @if(!empty($module->data['logo_cover']) && $module->data['active_logo'])
                        <img src="{{$module->data['logo_cover']}}" />
                    @else
                        <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
                    @endif
                @endif
                
                @if(!empty($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src="{{$module->data['central_image_cover']}}"/>
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider">
                <div class="image">
                    @if (isMobile())
                        <img src="{{$module->data['mobile_design']}}"/>
                    @else
                        <img src="{{$module->data['desktop_design']}}"/>
                    @endif
                </div>
            </div>
        </section>
        @break
    @default
        <header>
            @if(!empty ($module->data['logo_cover']) && $module->data['active_logo'])
                <img src={{$module->data['logo_cover']}} />
            @else 
                <h1>{!!(empty($module->data['names'])) ? '' : $module->data['names']!!}</h1>
            @endif
        </header>
        <section class="cover design">
            <div class="text">
                @if(!empty ($module->data['central_image_cover']) && $module->data['active_central'])
                    <img src="{{$module->data['central_image_cover']}}" />
                @else
                    <h2>{!!$module->data['tittle']!!}</h2>
                    <p>{!!$module->data['detail']!!}</p>
                @endif
            
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>
            <div class="slider">
                <div class="image">
                    @if (isMobile())
                        <img src="{{$module->data['mobile_design']}}"/>
                    @else
                        <img src="{{$module->data['desktop_design']}}"/>
                    @endif
                </div>
            </div>
        </section>
        @break
@endswitch

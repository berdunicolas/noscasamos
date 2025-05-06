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

@if ($module['format'] === 'Imagenes' && $module['frame_type'] === 'Fullscreen')
    @if($module['frame_type'] !== 'Fullscreen')
        <header style="background-color:{{$principalColor}}">
        @if(!empty ($module['logo_cover']))
            <img src="{{$module['logo_cover']}}"/>
        @else 
            <h1 style="color:{{$backgroundColor}}">{{$nombres}}</h1>
        @endif
        </header>
    @endif
    <section class="cover full">
        <div class="text">
            
            {{--@if ($module['frame_type'] !== 'Fullscreen')  No esta claro --}}
                @if (!empty ($module['logo_cover']))

                        {{--@if($logo != "n")--}}
                            <img src="{{$module['logo_cover']}}"/>
                        {{--@endif--}}
                @else 
                    <h1>{{$nombres}}</h1>
                @endif
            {{--@endif--}}
            
            @if (!empty ($module['central_image_cover']))
                {{--@if($central != "n")--}}
                    <img src="{{$module['central_image_cover']}}"/>
                {{--@endif--}}
            @else
                <h2>{{$module['tittle']}}</h2>
                <p>{{$module['detail']}}</p>
            @endif
            
            <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
        </div>

        <div class="slider" id="slider">
            @if (isMobile())
                @php
                    $images = [$module['mobile_images']];
                @endphp
                {{--/*
                    if ($handle = opendir(asset('boda/images/portadas/mobile'))) {
                        while (false !== ($file = readdir($handle))) {
                        if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                                $dirFiles[] = $file;
                            }
                        }
                        closedir($handle);
                    }
                    sort($dirFiles);*/
                --}}
                @foreach($images as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @else
                @php
                    $images = [$module['desktop_images']];
                @endphp
                {{--/*
                $dirFiles = array();
                if ($handle = opendir(asset('boda/images/portadas'))) {
                    while (false !== ($file = readdir($handle))) {
                    if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                            $dirFiles[] = $file;
                        }
                    }
                    closedir($handle);
                }
                sort($dirFiles);
                */--}}
                @foreach($images as $image)
                    <div class='image'><img src="{{$image}}"></div>
                @endforeach
            @endif
        </div>
    </section>


    <script src="../assets/js/slider.js"></script>


@elseif($module['format'] === 'Video' && $module['frame_type'] === 'Fullscreen')
    
@endif





{{-- 
@switch($portada)
    @case("v")
        @if($header == "s")
            <header style="background-color:{{$pcolor}}">
            @if(!empty ($logo))
                <img src='images/{{$logo}}'/>
            @else 
                <h1 style="color:{{$bcolor}}">{{$nombres}}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full">
            <div class="text">
                
                @if ($header == "n")
                    @if (!empty ($logo)) 
                        @if ($logo != "n")
                            <img src='images/{{$logo}}'/>
                        @endif
                    @else 
                    <h1>{{$nombres}}</h1>
                    @endif
                @endif
                
                @if (!empty ($central))
                    @if ($central != "n")
                        <img src='images/{{$central}}'/>
                    @endif
                @else
                    <h2>{{$titulo}}</h2>
                    <p>{{$bajada}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="images/'{{(isMobile()) ? $videoportada : $videoportada . 'm'}}.mp4" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("vv")
        @if($header == "s")
            <header style="background-color:{{$pcolor}}">
            @if(!empty ($logo))
                <img src='images/{{$logo}}'/>
            @else 
                <h1 style="color:{{$bcolor}}">{{$nombres}}</h1>
            @endif
            </header>
        @endif
        
        <section class="cover full">
            <div class="text">
                
                @if ($header == "n")
                    @if (!empty ($logo)) 
                        @if ($logo != "n")
                            <img src='images/{{$logo}}'/>
                        @endif
                    @else 
                    <h1>{{$nombres}}</h1>
                    @endif
                @endif
                
                @if (!empty ($central))
                    @if ($central != "n")
                        <img src='images/{{$central}}'/>
                    @endif
                @else
                    <h2>{{$titulo}}</h2>
                    <p>{{$bajada}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            <div class="center">
                <video autoplay muted loop class="video" id="myVideo">
                   <source src="images/'{{(isMobile()) ? $videoportada : $videoportada . 'm'}}.mp4" type="video/mp4">
                </video>
            </div>
        </section>
        @break
    @case("ff")
        @if($header == "s")
            <header style="background-color:{{$pcolor}}">
            @if(!empty ($logo))
                <img src='images/{{$logo}}'/>
            @else 
                <h1 style="color:{{$bcolor}}">{{$nombres}}</h1>
            @endif
            </header>
        @endif
        <section class="cover full">
            <div class="text">
                
                @if ($header == "n")
                    @if (!empty ($logo)) 
                        @if ($logo != "n")
                            <img src='images/{{$logo}}'/>
                        @endif
                    @else 
                    <h1>{{$nombres}}</h1>
                    @endif
                @endif
                
                @if (!empty ($central))
                    @if ($central != "n")
                        <img src='images/{{$central}}'/>
                    @endif
                @else
                    <h2>{{$titulo}}</h2>
                    <p>{{$bajada}}</p>
                @endif
                
                <i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>
            </div>

            @php
                echo '<div class="slider" id="slider">';
                if (isMobile()) {
                    $dirFiles = array();
                    if ($handle = opendir(asset('boda/images/portadas/mobile'))) {
                        while (false !== ($file = readdir($handle))) {
                        if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                                $dirFiles[] = $file;
                            }
                        }
                        closedir($handle);
                    }
                    sort($dirFiles);
                    foreach($dirFiles as $file)
                    {
                        echo "<div class='image'><img src=\"images/portadas/mobile/$file\"></div>";
                    }
                } else {
                    $dirFiles = array();
                    if ($handle = opendir(asset('boda/images/portadas'))) {
                        while (false !== ($file = readdir($handle))) {
                        if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                                $dirFiles[] = $file;
                            }
                        }
                        closedir($handle);
                    }
                    sort($dirFiles);
                    foreach($dirFiles as $file)
                    {
                        echo "<div class='image'><img src=\"images/portadas/$file\"></div>";
                    }
                }
                echo '</div></section>';

                $directory = "images/portadas/";
                $filecount = count(glob($directory . "*"));
                if ($filecount > 1) {
                    echo'<script src="../assets/js/slider.js"></script>';
                }
            @endphp
        @break

    @case("f")
        @php
            echo '<header>';
            if (!empty ($logo)) {echo "<img src='images/".$logo."'/>";} 
            else {echo '<h1>' . $nombres . '</h1>';}
            echo '</header>';
                
            echo'<section class="cover"><div class="text">';
            
            if (!empty ($central)) {
                if ($central == "n"){}
                else {echo "<img src='images/".$central."'/>";}
            } else {         
                echo'<h2>' . $titulo . '</h2>';
                echo'<p>' . $bajada . '</p>';
            }
            
            echo'<i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>';
            echo'</div>';
            echo '<div class="slider" id="slider">';
            if (isMobile()) {
                $dirFiles = array();
                if ($handle = opendir(asset('boda/images/portadas/mobile'))) {
                    while (false !== ($file = readdir($handle))) {
                    if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                            $dirFiles[] = $file;
                        }
                    }
                    closedir($handle);
                }
                sort($dirFiles);
                foreach($dirFiles as $file)
                {
                    echo "<div class='image'><img src=\"images/portadas/mobile/$file\"></div>";
                }
            } else {
                $dirFiles = array();
                if ($handle = opendir(asset('boda/images/portadas'))) {
                    while (false !== ($file = readdir($handle))) {
                    if (stripos($file, '.jpg') !== false || stripos($file, '.jpg') !== false){
                            $dirFiles[] = $file;
                        }
                    }
                    closedir($handle);
                }
                sort($dirFiles);
                foreach($dirFiles as $file)
                {
                    echo "<div class='image'><img src=\"images/portadas/$file\"></div>";
                }
            }
            echo '</div></section>';

            $directory = "images/portadas/";
            $filecount = count(glob($directory . "*"));
            if ($filecount > 1) {
                echo'<script src="../assets/js/slider.js"></script>';
            }

            echo '</div></section>';
        @endphp
        @break
    @case("dd")
        @php
            if ($header == "s"){
                echo '<header style="background-color:'.$pcolor.'">';
                if (!empty ($logo)) {echo "<img src='images/".$logo."'/>";} 
                else {echo '<h1 style="color:'.$bcolor.'">' . $nombres . '</h1>';}
                echo '</header>';
            }
            
            echo '<section class="cover full design"><div class="text">';
            
            if ($header == "n"){
                if (!empty ($logo)) {
                    if ($logo == "n"){}
                    else {echo "<img src='images/".$logo."'/>";}
                    }
                    
                else {
                    echo '<h1>' . $nombres . '</h1>';
                    }
            }
            
            if (!empty ($central)) {
                if ($central == "n"){}
                else {echo "<img src='images/".$central."'/>";}
            } else {         
                echo'<h2>' . $titulo . '</h2>';
                echo'<p>' . $bajada . '</p>';
            }
            
            echo'<i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>';
            echo '</div>';
            echo '<div class="slider"><div class="image">';
            if (isMobile()) {
                echo '<img src="images/designm.jpg"/>';
            } else {
                echo '<img src="images/design.jpg"/>';
            }
            echo '</div></div></section>';
        @endphp
        @break
    @default
        @php
            echo '<header>';
                if (!empty ($logo)) {echo "<img src='images/".$logo."'/>";} 
                else {echo '<h1>' . $nombres . '</h1>';}
            echo '</header>';
            
            echo'<section class="cover design"><div class="text">';
            
            if (!empty ($central)) {
                if ($central == "n"){}
                else {echo "<img src='images/".$central."'/>";}
            } else {         
                echo'<h2>' . $titulo . '</h2>';
                echo'<p>' . $bajada . '</p>';
            }
            
            echo'<i class="fal fa-angle-down wow animate__animated animate__fadeInDown" data-wow-iteration="infinite" data-wow-duration="1.5s" data-wow-offset="0"></i>';
            echo'</div>';
            echo '<div class="slider"><div class="image">';
            if (isMobile()) {
                echo '<img src="images/designm.jpg"/>';
            } else {
                echo '<img src="images/design.jpg"/>';
            }
            echo '</div></div></section>';
        @endphp
        @break
@endswitch
--}}
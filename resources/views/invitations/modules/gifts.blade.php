@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$regalosicons = "";
$regalosiconf = "fa-gift";
$regalosicon = "kezeezyg";


@endphp


<section class="gifts" style="background-image: url('{{$module['background_image']}}');">
    <div class="card wow animate__animated animate__fadeInUp" data-wow-duration="1s">
        @empty(!$module['module_image'])
            <img src="{{$module['module_image']}}" alt="{{$module['pre_tittle']}}" style="max-width:90%;"/>
        @endempty
        
        @empty(!$module['icon'])
            @if($icontype==='Animado')
                <lord-icon src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$regalosicons}}" stroke="{{$stroke}}" delay="300" colors="primary:#666,secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$module['icon']}}"></i>
            @endif
        @endempty
                    
        @empty(!$module['pre_tittle'])
            <h2>{{$module['pre_tittle']}}</h2>
        @endempty
        @empty(!$module['text'])
            <p>{!!$module['text']!!}</p>
        @endempty
        
        @if(!empty ($module['button_text']))
            @if($module['button_type'] == 'Link'))
                <a class="modal-button" href="{{$module['button_url']}}">{{$module['button_text']}}</a>
            @else
                <button class="modal-button" href="#myModal1">{{$module['button_text']}}</button>
            @endif
        @endif
    </div>
    

    <div class="modalGift" id="myModal1">
        <div class="contenido-modal">
            <span class="closeModal"><i class="fa-regular fa-xmark"></i></span>
            
            <!-- REGALO 1 = CUENTA 1 -->
            @if($module['first_account']['active'])
                <div class="item">
                    <div class="left">
                        <h3>{{$module['first_account']['tittle']}}</h3>
                    </div>
                    <div class="right">
                        <p>{!!$module['first_account']['text']!!}</p>
                        @empty(!$module['first_account']['value'])
                            <p><b>{{$module['first_account']['data']}}:</b></P>
                            <input type="text" disabled="disabled" value="{{$module['first_account']['value']}}" id="GfGInput">
                            <p id="gfg" class="gfg"></p>
                            <span onclick="GeeksForGeeks()" value="Copy"><i class="fa-regular fa-copy"></i>Copiar {{$module['first_account']['data']}}</span>
                        @endempty
                        {{--@if($btncopiar == "s")
                            <p id="gfg" class="gfg"></p>
                            <span onclick="GeeksForGeeks()" value="Copy"><i class="fa-regular fa-copy"></i>{{$regalocbucopiabtn}}</span>
                        @endif--}}
                    </div>
                </div>
            @endif
            <!-- REGALO 2 = CUENTA 2-->
            @if($module['second_account']['active'])
                <div class="item">
                    <div class="left">
                        <h3>{{$module['second_account']['tittle']}}</h3>
                    </div>
                    <div class="right">
                        <p>{!!$module['second_account']['text']!!}</p>
                        @empty(!$module['second_account']['button_text'])
                            <a href="{{$module['second_account']['button_url']}}" class="link">{{$module['second_account']['button_text']}}</a>
                        @endempty
                    </div>
                </div>
            @endif
            <!-- REGALO 3 = BUZON -->
            @if($module['box']['active'])
            <div class="item">
                <div class="left">
                    <h3>{{$module['box']['tittle']}}</h3>
                </div>
                <div class="right">
                    <p>{!!$module['box']['text']!!}</p>
                    @empty(!$module['box']['button_text'])
                    <a href="{{$module['box']['button_url']}}" class="link">{{$module['box']['button_text']}}</a>
                    @endempty
                </div>
            </div>
            @endif
            
            <!-- CATALOGO = LISTA -->
            @if ($module['list']['active'])
            <div class="item">
                <div class="left">
                    <h3>{{$module['list']['tittle']}}</h3>
                </div>
                <div class="right">
                    @empty(!$module['list']['text'])
                    <p>{!!$module['list']['text']!!}</p>
                    @endempty
                    
                    <div class="list">
                        @empty(!$module['list']['product_1'])
                            <a href="{{$module['list']['product_url_1']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_1']}}"/>--}}
                                <img src="{{$module['list']['product_image_1']}}" alt="{{$module['list']['product_1']}}"/>
                                <p>{{$module['list']['product_1']}}</p>
                                <h4>{{$module['list']['product_price_1']}}</h4>
                            </a>
                        @endempty
                        @empty(!$module['list']['product_2'])
                            <a href="{{$module['list']['product_url_2']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_2']}}"/>--}}
                                <img src="{{$module['list']['product_image_2']}}" alt="{{$module['list']['product_2']}}"/>
                                <p>{{$module['list']['product_2']}}</p>
                                <h4>{{$module['list']['product_price_2']}}</h4>
                            </a>
                        @endempty
                        @empty(!$module['list']['product_3'])
                            <a href="{{$module['list']['product_url_3']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_3']}}"/>--}}
                                <img src="{{$module['list']['product_image_3']}}" alt="{{$module['list']['product_3']}}"/>
                                <p>{{$module['list']['product_3']}}</p>
                                <h4>{{$module['list']['product_price_3']}}</h4>
                            </a>
                        @endempty
                        @empty(!$module['list']['product_4'])
                            <a href="{{$module['list']['product_url_4']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_4']}}"/>--}}
                                <img src="{{$module['list']['product_image_4']}}" alt="{{$module['list']['product_4']}}"/>
                                <p>{{$module['list']['product_4']}}</p>
                                <h4>{{$module['list']['product_price_4']}}</h4>
                            </a>
                        @endempty
                        @empty(!$module['list']['product_5'])
                            <a href="{{$module['list']['product_url_5']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_5']}}"/>--}}
                                <img src="{{$module['list']['product_image_5']}}" alt="{{$module['list']['product_5']}}"/>
                                <p>{{$module['list']['product_5']}}</p>
                                <h4>{{$module['list']['product_price_5']}}</h4>
                            </a>
                        @endempty
                        @empty(!$module['list']['product_6'])
                            <a href="{{$module['list']['product_url_6']}}">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module['list']['product_6']}}"/>--}}
                                <img src="{{$module['list']['product_image_6']}}" alt="{{$module['list']['product_6']}}"/>
                                <p>{{$module['list']['product_6']}}</p>
                                <h4>{{$module['list']['product_price_6']}}</h4>
                            </a>
                        @endempty
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
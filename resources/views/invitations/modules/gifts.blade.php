@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$regalosicons = "";
$regalosiconf = "fa-gift";
$regalosicon = "kezeezyg";


@endphp


<section class="gifts" style="background-image: url('{{$module->data['background_image']}}');">
    <div class="card wow animate__animated animate__fadeInUp" data-wow-duration="1s">
        @empty(!$module->data['module_image'])
            <img src="{{$module->data['module_image']}}" alt="{{$module->data['pre_tittle']}}" style="max-width:90%;"/>
        @endempty
        
        @empty(!$module->data['icon'])
            @if($icontype==='Animado')
                <lord-icon src="https://cdn.lordicon.com/{{$module->data['icon']}}.json" trigger="{{$trigger}}" state="{{$regalosicons}}" stroke="{{$stroke}}" delay="300" colors="primary:#666,secondary:{{$color}}" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$module->data['icon']}}"></i>
            @endif
        @endempty
                    
        @empty(!$module->data['pre_tittle'])
            <h2>{!!$module->data['pre_tittle']!!}</h2>
        @endempty
        @empty(!$module->data['text'])
            <p>{!!$module->data['text']!!}</p>
        @endempty
        
        @if(!empty ($module->data['button_text']))
            @if($module->data['button_type'] == 'Link')
                <a class="modal-button" href="https://{{$module->data['button_url']}}" target="_blank">{!!$module->data['button_text']!!}</a>
            @else
                <button class="modal-button" href="#myModal1">{!!$module->data['button_text']!!}</button>
            @endif
        @endif
    </div>
    

    <div class="modalGift" id="myModal1">
        <div class="contenido-modal">
            <span class="closeModal"><i class="fa-regular fa-xmark"></i></span>
            
            <!-- REGALO 1 = CUENTA 1 -->
            @if($module->data['first_account']['active'])
                <div class="item">
                    <div class="left">
                        <h3>{!!$module->data['first_account']['tittle']!!}</h3>
                    </div>
                    <div class="right">
                        <p>{!!$module->data['first_account']['text']!!}</p>
                        @empty(!$module->data['first_account']['value'])
                            <p><b>{{$module->data['first_account']['data']}}:</b></P>
                            <input type="text" disabled="disabled" value="{{$module->data['first_account']['value']}}" id="GfGInput">
                            <p id="gfg" class="gfg"></p>
                            <span onclick="GeeksForGeeks()" value="Copy"><i class="fa-regular fa-copy"></i>Copiar {{$module->data['first_account']['data']}}</span>
                        @endempty
                        {{--@if($btncopiar == "s")
                            <p id="gfg" class="gfg"></p>
                            <span onclick="GeeksForGeeks()" value="Copy"><i class="fa-regular fa-copy"></i>{{$regalocbucopiabtn}}</span>
                        @endif--}}
                    </div>
                </div>
            @endif
            <!-- REGALO 2 = CUENTA 2-->
            @if($module->data['second_account']['active'])
                <div class="item">
                    <div class="left">
                        <h3>{!!$module->data['second_account']['tittle']!!}</h3>
                    </div>
                    <div class="right">
                        <p>{!!$module->data['second_account']['text']!!}</p>
                        @empty(!$module->data['second_account']['button_text'])
                            <a href="https://{{$module->data['second_account']['button_url']}}" class="link" target="_blank">{!!$module->data['second_account']['button_text']!!}</a>
                        @endempty
                    </div>
                </div>
            @endif
            <!-- REGALO 3 = BUZON -->
            @if($module->data['box']['active'])
            <div class="item">
                <div class="left">
                    <h3>{!!$module->data['box']['tittle']!!}</h3>
                </div>
                <div class="right">
                    <p>{!!$module->data['box']['text']!!}</p>
                    @empty(!$module->data['box']['button_text'])
                    <a href="https://{{$module->data['box']['button_url']}}" class="link" target="_blank">{!!$module->data['box']['button_text']!!}</a>
                    @endempty
                </div>
            </div>
            @endif
            
            <!-- CATALOGO = LISTA -->
            @if ($module->data['list']['active'])
            <div class="item">
                <div class="left">
                    <h3>{!!$module->data['list']['tittle']!!}</h3>
                </div>
                <div class="right">
                    @empty(!$module->data['list']['text'])
                    <p>{!!$module->data['list']['text']!!}</p>
                    @endempty
                    
                    <div class="list">
                        @empty(!$module->data['list']['product_1'])
                            <a href="https://{{$module->data['list']['product_url_1']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_1']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_1']}}" alt="{{$module->data['list']['product_1']}}"/>
                                <p>{!!$module->data['list']['product_1']!!}</p>
                                <h4>{!!$module->data['list']['product_price_1']!!}</h4>
                            </a>
                        @endempty
                        @empty(!$module->data['list']['product_2'])
                            <a href="https://{{$module->data['list']['product_url_2']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_2']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_2']}}" alt="{{$module->data['list']['product_2']}}"/>
                                <p>{!!$module->data['list']['product_2']!!}</p>
                                <h4>{!!$module->data['list']['product_price_2']!!}</h4>
                            </a>
                        @endempty
                        @empty(!$module->data['list']['product_3'])
                            <a href="https://{{$module->data['list']['product_url_3']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_3']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_3']}}" alt="{{$module->data['list']['product_3']}}"/>
                                <p>{!!$module->data['list']['product_3']!!}</p>
                                <h4>{!!$module->data['list']['product_price_3']!!}</h4>
                            </a>
                        @endempty
                        @empty(!$module->data['list']['product_4'])
                            <a href="https://{{$module->data['list']['product_url_4']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_4']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_4']}}" alt="{{$module->data['list']['product_4']}}"/>
                                <p>{!!$module->data['list']['product_4']!!}</p>
                                <h4>{!!$module->data['list']['product_price_4']!!}</h4>
                            </a>
                        @endempty
                        @empty(!$module->data['list']['product_5'])
                            <a href="https://{{$module->data['list']['product_url_5']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_5']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_5']}}" alt="{{$module->data['list']['product_5']}}"/>
                                <p>{!!$module->data['list']['product_5']!!}</p>
                                <h4>{!!$module->data['list']['product_price_5']!!}</h4>
                            </a>
                        @endempty
                        @empty(!$module->data['list']['product_6'])
                            <a href="https://{{$module->data['list']['product_url_6']}}" target="_blank">
                                {{--<img src="images/regalos/{{$productoimg1}}" alt="{{$module->data['list']['product_6']}}"/>--}}
                                <img src="{{$module->data['list']['product_image_6']}}" alt="{{$module->data['list']['product_6']}}"/>
                                <p>{!!$module->data['list']['product_6']!!}</p>
                                <h4>{!!$module->data['list']['product_price_6']!!}</h4>
                            </a>
                        @endempty
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
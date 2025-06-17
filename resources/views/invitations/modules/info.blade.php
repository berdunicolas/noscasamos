@php

$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold


$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$infoicons = "hover-heartbeat-alt";

$infoicon = "warimioc"; 
@endphp


<section class="content wow animate__animated animate__fadeInUp" style="{{(!empty($padding)) ? 'padding:'.$padding.'px 0px;' : ''}} background-image: url('{{(!empty($marco)) ? $marco : ''}}'); background-repeat:repeat-x;">
    <div class="info" style="padding:50px 0px;">
    @if(!empty($module->data['image']) && $module->data['on_t_right'])
        <div class="image wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
            <img src="{{$module->data['image']}}" alt="{{$module->data['tittle']}}"/>
        </div>
    @endif
        
    @if (!empty($module->data['tittle']))
        <div class="text wow animate__animated animate__fadeInUp">
            @empty(!$module->data['icon'])
                @if($icontype==='a')
                    <lord-icon src="https://cdn.lordicon.com/{{$infoicon}}.json" trigger="{{$trigger}}" state="{{$infoicons}}" stroke="{{$stroke}}" delay="500" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                @else
                    <i class="fa-thin {{$module->data['icon']}}"></i>
                @endif
            @endempty
                <h2>{{$module->data['tittle']}}</h2>
            @empty(!$module->data['text'])
            <p>{{$module->data['text']}}</p>
            @endempty
        </div>
    @endif   
    @if (!empty($module->data['image']) && !$module->data['on_t_right'])
        <div class="image wow animate__animated animate__fadeInUp">
            <img src="{{$module->data['image']}}" alt="{{$module->data['tittle']}}"/>
        </div>
    @endif
    </div>
</section>
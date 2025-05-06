@php



$destacado = "s"; // s = Si o n = No //
$destacadotitulo = "La medida del amor es amar sin medida";
$destacadotxt = "San Agustín";
$destacadoicons = "hover-heartbeat-alt";
$destacadoiconf = "fa-heart";
$destacadoicon = "";
$destacadoimg = "destacada.jpg";

@endphp

@if($destacado == "s")
    <section class="content full" style="background-image:url('images/{{$destacadoimg}}');">
        <div class="info">
            <div class="text wow animate__animated animate__fadeInUp">
                @empty(!$destacadoicon)
                    @if($icontype==='a')
                        <lord-icon src="https://cdn.lordicon.com/{{$destacadoicon}}.json" trigger="{{$trigger}}" state="{{$destacadoicons}}" stroke="{{$stroke}}" delay="500" colors="primary:#fff,secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$destacadoiconf}}"></i>
                    @endif
                @endempty
                        
                @empty(!$destacadotitulo)
                    <h2>{{$destacadotitulo}}</h2>
                @endempty
                <p>{{$destacadotxt}}</p>
<!--                    <a href="#">Ver más</a>-->
            </div>
        </div>
    </section>
@endif
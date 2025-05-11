@php
$clasic = '"Old Standard TT", serif;';
$minimal = '"Poppins", sans-serif;';
$script = '"Sacramento", cursive;';
$deco = '"Parisienne", cursive;';
$display = '"Abril Fatface", cursive;';
$fiber = '"Permanent Marker", cursive;';
if (isset($_GET['n'])) {
    $invitadon = $_GET['n'];
} else {
    $invitadon = "";
}
if (isset($_GET['c'])) {
    $invitadoc = $_GET['c'];
} else {
    $invitadoc = "";
}

////

$pcolor = "#E2BF83"; //Color Principal//
$bcolor = "#F6F4F0"; //Color de Fondo//
$style = "c"; //c = Claro o = Oscuro//
$font = $clasic; //Estilo de Texto//
$icontype = "a"; // Tipo de icono a = Animado
$trigger = "loop"; // Animación de icono
$stroke = "light"; // Estilo de Icono = light regular bold

$padding = ""; // Padding de los bloques - Vacío = Default
$marco = ""; // Imagen de marco para los bloques

$proveedor = "noscasamos"; //Nombre Archivo HTML//

////

$bienvenida = "s"; // s = Si o n = No //
$bienvenidatitulo = "Bienvenidos!";
$bienvenidatxt = "Esto es un ejemplo, donde podrás ver las principales características que incluyen nuestras invitaciones. <br><br>Todos los módulos, contenidos, fotos, textos, colores y tipo de letra, son opcionales y se personalizan 100% para tu evento. <br><br>Esperamos que te guste!";
$bienvenidaicons = "hover-heartbeat-alt";
$bienvenidaiconf = "fa-heart";
$bienvenidaicon = "aydxrkfl";
$bienvenidaimg = "destacada.jpg";
$bienvenidamarco = $marco;
@endphp


<section class="content wow animate__animated animate__fadeInUp">
    <div class="info">    
        @empty(!$module["tittle"])
            <div class="text">
                @empty(!$module['text'])
                    @if($icontype==='a')
                        <lord-icon src="https://cdn.lordicon.com/{{$bienvenidaicon}}.json" trigger="{{$trigger}}" state="{{$bienvenidaicons}}" stroke="{{$stroke}}" delay="500" colors="primary:{{($style=="o") ? '#fff' : '#666'}},secondary:{{$pcolor}}" style="width:70px;height:70px"></lord-icon>
                    @else
                        <i class="fa-thin {{$module['icon']}}"></i>
                    @endif
                @endempty
                @empty(!$module['tittle'])
                    <h2>{{$module['tittle']}}</h2>
                @endempty
                <p>{!!$module['text']!!}</p>
                <!--                    <a href="#">Ver más</a>-->
            </div>
        @endempty

        @empty(!$module['image'])
            <div class="image">
                <img src="{{$module['image']}}" alt="{{$module['tittle']}}"/>
            </div>
        @endempty
    </div>
</section>
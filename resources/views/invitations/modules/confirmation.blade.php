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

$rsvp = "s"; // s = Si o n = No //
$rsvpicos = "s";
$rsvpicof = "fa-clipboard-list";
$rsvpico = "heqlbljj";
$rsvpantetitulo = "rsvp";
$rsvptitulo = "Confirmación de Asistencia";
$rsvptxt = "Esperamos contar con tu presencia";
$rsvplimite = "";
$rsvplimitetxt = "Por favor confirmar antes del";
$rsvpbtn = "Confirmar Asistencia";
$linkconfirmacion = ""; //https://api.whatsapp.com/send?phone=5493815802802&text=%C2%A1Hola%21+quiero+confirmar+mi+asistencia+en+su+boda
// Info extra
$extratitulo = ""; // Ej: Valór de Tarjetas
$extratxt = "";
$extrabtn = "s"; // s = Boton visible
$extrabtntxt = "Cómo abonar"; // Texto del botón
// Formulario

$aclaracionform = "El formulario es individual.<br> Si tu invitación incluye acompañantes repetí el proceso por cada persona."; // 
$asistire = "Asistiré";
$noasistire = "No Asistiré";
$nombre = "Apellido y Nombre";
$correo = "";
$telefono = "";
$menu = "¿Necesitas un menú especial?";
$menu1 = "Ninguno";
$menu2 = "Celíaco";
$menu3 = "Vegetariano";
$menu4 = "Vegano";
$menu5 = "Diabético";
$acompanantes = ""; //Apellido y nombres de acompañantes (si corresponde)
$traslado = "";
$traslado1 = "No, voy por mis propios medios";
$traslado2 = "Si, necesito traslado";
$traslado3 = "";
$traslado4 = "";
$comentarios = "Comentarios";
$msgerror = "Por favor completa todos los campos";
$gracias = "¡Gracias por confirmar tu asistencia!";
@endphp

<section class="confirmation">
    <div class="wow animate__animated animate__fadeInUp">
        @empty(!empty($rsvpico))
            @if ($icontype==='a')
                <lord-icon src="https://cdn.lordicon.com/{{$rsvpico}}.json" trigger="{{$trigger}}" state="{{$rsvpicos}}" stroke="{{$stroke}}" delay="300" colors="primary:#fff,secondary:#fff" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$rsvpicof}}"></i>
            @endif
        @endempty
        <br/>
        <span>{{$rsvpantetitulo}}</span>
        <h2>{{$rsvptitulo}}</h2>
        <p>{{$rsvptxt}}</p>
        @empty (!$rsvplimite)
            <p style='max-width: 790px; margin-top: 10px;'>{{$rsvplimitetxt}} {{$rsvplimite}}</p>            
        @endempty

        <!-- DETALLES EXTRA -->
        @empty (!$extratitulo)
            <div class="value">
                <h3>{{$extratitulo}}</h3>
                <p>{{$extratxt}}</p>
                @if ($extrabtn == "s")
                    <button class="link modal-button" href="#myModal1">{{$extrabtntxt}}</button>
                @endif
            </div>
        @endempty
        @empty (!$rsvpbtn)    
            @if (!empty ($linkconfirmacion)) 
                <a class="link modal-button" href="{{$linkconfirmacion}}" target="_blank" style="padding:15px 32px;"><i class="fa-regular fa-circle-check" style="margin-right:10px"></i>{{$rsvpbtn}}</a>
            @else 
                <button class="link modal-button" href="#myModal2" style="padding:15px 32px;"><i class="fa-regular fa-circle-check" style="margin-right:10px"></i>{{$rsvpbtn}}</button>
            @endif
        @endempty
    </div>
    <div class="modalGift" id="myModal2">
    <div class="contenido-modal">
            <span class="closeModal"><i class="fa-regular fa-xmark"></i></span>
            <div class="cont">
                <span>{{$rsvpantetitulo}}</span>
                <h2>{{$rsvptitulo}}</h2>
                @empty(!$invitadoc)
                    <p>Personas / Pases <b>({{$invitadoc}})</b></p>
                @endempty
                @empty(!$aclaracionform)
                    <p>{{$aclaracionform}}</p>
                @endempty
                
                <div class="form">
                    <div class="msj error" style="display:none">{{$msgerror}}</div>
                    <form method="post" action="_save.php">
                        @csrf
                        <div class="radio">
                            <label class="container">{{$asistire}}
                                <input type="radio" checked="checked" value="si" name="asistencia">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">{{$noasistire}}
                                <input type="radio" value="no" name="asistencia">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <input type="hidden" name="asiste" id="asiste" value="si"/>
                        
                        <label>{{$nombre}}</label>
                        <input type="text" name="nombre" id="nombre" value="{{(empty($invitadon)) ? '' : $invitadon}}"/>
                        
                        <label>{{$correo}}</label>
                        <input {{(!empty($correo)) ? 'type="text"' : 'type="hidden"'}} name="mail" id="mail"/>

                        <label>{{$telefono}}</label>
                        <input {{(!empty($telefono)) ? 'type="text"' : 'type="hidden"'}} name="telefono" id="telefono"/>
                        
                        @empty(!$menu)
                        <label>{{$menu}}</label>
                        <div class="selectField">
                            <i class="fa-regular fa-angle-down"></i>
                            <select name="alimentos" id="alimentos" onchange="javacript: var typename = this.options[selectedIndex].text; document.getElementById('alimento').value = typename;">
                                {{(!empty($menu1)) ? '<option value="'.$menu1.'">'.$menu1.'</option>' : ''}}
                                {{(!empty($menu2)) ? '<option value="'.$menu2.'">'.$menu2.'</option>' : ''}}
                                {{(!empty($menu3)) ? '<option value="'.$menu3.'">'.$menu3.'</option>' : ''}}
                                {{(!empty($menu4)) ? '<option value="'.$menu4.'">'.$menu4.'</option>' : ''}}
                                {{(!empty($menu5)) ? '<option value="'.$menu5.'">'.$menu5.'</option>' : ''}}
                                <!--<option value="valor">valor</option>-->
                            </select> 
                        </div>
                        @endempty
                        <input type="hidden" name="alimento" id="alimento" value="Ninguna"/>

                        @empty(!$traslado)
                        <label>{{$traslado}}</label>
                        <div class="selectField">
                            <i class="fa-regular fa-angle-down"></i>
                            <select name="traslados"  id="traslados" onchange="javacript: var typename = this.options[selectedIndex].text; document.getElementById('traslado').value = typename;">
                                {{(!empty($traslado1)) ? '<option value="'.$traslado1.'">'.$traslado1.'</option>' : ''}}
                                {{(!empty($traslado2)) ? '<option value="'.$traslado2.'">'.$traslado2.'</option>' : ''}}
                                {{(!empty($traslado3)) ? '<option value="'.$traslado3.'">'.$traslado3.'</option>' : ''}}
                                {{(!empty($traslado4)) ? '<option value="'.$traslado4.'">'.$traslado4.'</option>' : ''}}
<!--                                    <option value="valor">valor</option>-->
                            </select> 
                        </div>
                        @endempty
                        <input type="hidden" name="traslado" id="traslado" value="no"/>
                        
                        <label>{{$acompanantes}}</label>
                        <input {{(!empty($acompanantes)) ? '' : 'type="hidden"'}} type="text"  name="nombre_a"  id="nombre_a"/>

                        <label>{{$comentarios}}</label>
                        <input {{(!empty($comentarios)) ? 'type="text"' : 'type="hidden"'}} name="comentarios" id="comentarios"/>

                        <button class="submit" type="submit" name="save" style=""><i class="fa-regular fa-check-circle"></i>{{$rsvpbtn}}</button>
                        <div id="data"></div>

                    </form>
                </div>
            </div>
            <div class="thanks" style="display:none;">
                <lord-icon src="https://cdn.lordicon.com/qgtkfluv.json"  trigger="in" delay="300" state="in-reveal" stroke="light" colors="primary:#666,secondary:{{$pcolor}}" style="width:250px;height:250px"></lord-icon>
                <h2>{{$gracias}}</h2>
            </div>
        </div>
        </div>
</section>
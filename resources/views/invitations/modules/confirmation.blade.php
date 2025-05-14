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
$rsvplimite = "limnite";
$rsvplimitetxt = "Por favor confirmar antes del";
$rsvpbtn = "Confirmar Asistencia";
$linkconfirmacion = "https://api.whatsapp.com/send?phone=5493815802802&text=%C2%A1Hola%21+quiero+confirmar+mi+asistencia+en+su+boda"; //https://api.whatsapp.com/send?phone=5493815802802&text=%C2%A1Hola%21+quiero+confirmar+mi+asistencia+en+su+boda
// Info extra
//$extratitulo = ""; // Ej: Valór de Tarjetas
$extratitulo = "extra titulo"; // Ej: Valór de Tarjetas
//$extratxt = "";
$extratxt = "texto extra";
$extrabtn = "s"; // s = Boton visible
$extrabtntxt = "Cómo abonar"; // Texto del botón
// Formulario

$aclaracionform = "El formulario es individual.<br> Si tu invitación incluye acompañantes repetí el proceso por cada persona."; // 
$asistire = "Asistiré";
$noasistire = "No Asistiré";
$nombre = "Apellido y Nombre";
//$correo = "";
$correo = "correo";
//$telefono = "";
$telefono = "tel";
$menu = "¿Necesitas un menú especial?";
$menu1 = "Ninguno";
$menu2 = "Celíaco";
$menu3 = "Vegetariano";
$menu4 = "Vegano";
$menu5 = "Diabético";
//$acompanantes = ""; //Apellido y nombres de acompañantes (si corresponde)
$acompanantes = "Acompañantes"; //Apellido y nombres de acompañantes (si corresponde)
//$traslado = "";
$traslado = "Traslado";
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
        @empty(!$module['icon'])
            @if ($typeIcon == 'Animado')
                <lord-icon src="https://cdn.lordicon.com/{{$module['icon']}}.json" trigger="{{$trigger}}" state="{{$rsvpicos}}" stroke="{{$stroke}}" delay="300" colors="primary:#fff,secondary:#fff" style="width:70px;height:70px"></lord-icon>
            @else
                <i class="fa-thin {{$module['icon']}}"></i>
            @endif
        @endempty
        <br/>
        <span>{{$module['pre_tittle']}}</span>
        <h2>{{$module['tittle']}}</h2>
        <p>{!!$module['text']!!}</p>
        @empty (!$module['limit_date'])
            <p style='max-width: 790px; margin-top: 10px;'>{{$module['limit_date']}}</p>            
        @endempty

        <!-- DETALLES EXTRA -->
        @empty (!$module['card_active'])
            <div class="value">
                <h3>{{$module['extra_tittle']}}</h3>
                <p>{!!$module['extra_text']!!}</p>
                @empty (!$module['card_button_text'])
                    <button class="link modal-button" href="#myModal1">{{$module['card_button_text']}}</button>
                @endempty
            </div>
        @endempty
        @empty (!$module['form_button_text'])    
            @if (!empty ($module['form_button_url'])) 
                <a class="link modal-button" href="{{$module['form_button_url']}}" target="_blank" style="padding:15px 32px;"><i class="fa-regular fa-circle-check" style="margin-right:10px"></i>{{$module['form_button_text']}}</a>
            @else 
                <button class="link modal-button" href="#myModal2" style="padding:15px 32px;"><i class="fa-regular fa-circle-check" style="margin-right:10px"></i>{{$module['form_button_text']}}</button>
            @endif
        @endempty
    </div>
    <div class="modalGift" id="myModal2">
    <div class="contenido-modal">
            <span class="closeModal"><i class="fa-regular fa-xmark"></i></span>
            <div class="cont">
                <span>{{$module['pre_tittle']}}</span>
                <h2>{{$module['tittle']}}</h2>
                @empty(!$invitadoc)
                    <p>Personas / Pases <b>({{$invitadoc}})</b></p>
                @endempty
                @empty(!$module['form_text'])
                    <p>{!!$module['form_text']!!}</p>
                @endempty
                
                <div class="form">
                    <div class="msj error" style="display:none">{{$module['form_errors']}}</div>
                    <form method="post" action="_save.php">
                        @csrf
                        <div class="radio">
                            @empty(!$module['form_ill_attend'])
                                <label class="container">{{$module['form_ill_attend']}}
                                    <input type="radio" checked="checked" value="si" name="asistencia">
                                    <span class="checkmark"></span>
                                </label>
                            @endempty
                            @empty(!$module['form_ill_n_attend'])
                                <label class="container">{{$module['form_ill_n_attend']}}
                                    <input type="radio" value="no" name="asistencia">
                                    <span class="checkmark"></span>
                                </label>
                            @endempty
                        </div>
                        <input type="hidden" name="asiste" id="asiste" value="si"/>
                        
                        <label>{{empty($module['form_name'])? 'Nombre y apellido' : $module['form_name'] }}</label>
                        <input type="text" name="nombre" id="nombre" value="{{(empty($invitadon)) ? '' : $invitadon}}"/>
                        
                        @empty(!$module['form_email'])
                            <label>{{$module['form_email']}}</label>
                            <input name="mail" id="mail"/>
                        @endempty

                        @empty(!$module['form_phone'])
                            
                            <label>{{$module['form_phone']}}</label>
                            <input name="telefono" id="telefono"/>
                        @endempty

                        
                        @empty(!$module['form_special_menu'])
                            <label>{{$module['form_special_menu']}}</label>
                            <div class="selectField">
                                <i class="fa-regular fa-angle-down"></i>
                                <select name="alimentos" id="alimentos" onchange="javacript: var typename = this.options[selectedIndex].text; document.getElementById('alimento').value = typename;">
                                    {!!(!empty($module['form_nothing'])) ? '<option value="'.$module['form_nothing'].'">'.$module['form_nothing'].'</option>' : ''!!}
                                    {!!(!empty($module['form_menu1'])) ? '<option value="'.$module['form_menu1'].'">'.$module['form_menu1'].'</option>' : ''!!}
                                    {!!(!empty($module['form_menu2'])) ? '<option value="'.$module['form_menu2'].'">'.$module['form_menu2'].'</option>' : ''!!}
                                    {!!(!empty($module['form_menu3'])) ? '<option value="'.$module['form_menu3'].'">'.$module['form_menu3'].'</option>' : ''!!}
                                    {!!(!empty($module['form_menu4'])) ? '<option value="'.$module['form_menu4'].'">'.$module['form_menu4'].'</option>' : ''!!}
                                    {!!(!empty($module['form_menu5'])) ? '<option value="'.$module['form_menu5'].'">'.$module['form_menu5'].'</option>' : ''!!}
                                    <!--<option value="valor">valor</option>-->
                                </select> 
                            </div>
                        @endempty

                        @empty(!$module['form_transfer'])
                            <label>{{$module['form_transfer']}}</label>
                            <div class="selectField">
                                <i class="fa-regular fa-angle-down"></i>
                                <select name="traslados"  id="traslados" onchange="javacript: var typename = this.options[selectedIndex].text; document.getElementById('traslado').value = typename;">
                                    {!!(!empty($module['form_option1'])) ? '<option value="'.$module['form_option1'].'">'.$module['form_option1'].'</option>' : ''!!}
                                    {!!(!empty($module['form_option2'])) ? '<option value="'.$module['form_option2'].'">'.$module['form_option2'].'</option>' : ''!!}
                                    {!!(!empty($module['form_option3'])) ? '<option value="'.$module['form_option3'].'">'.$module['form_option3'].'</option>' : ''!!}
                                    {!!(!empty($module['form_option4'])) ? '<option value="'.$module['form_option4'].'">'.$module['form_option4'].'</option>' : ''!!}
    <!--                                    <option value="valor">valor</option>-->
                                </select> 
                            </div>
                        @endempty
                        
                        @empty(!$module['form_companions'])
                            <label>{{$module['form_companions']}}</label>
                            <input type="text"  name="nombre_a"  id="nombre_a"/>
                        @endempty

                        @empty(!$module['form_comments'])
                            <label>{{$module['form_comments']}}</label>
                            <input name="comentarios" id="comentarios"/>
                        @endempty


                        <button class="submit" type="submit" name="save" style=""><i class="fa-regular fa-check-circle"></i>{{$module['form_button_text']}}</button>
                        <div id="data"></div>

                    </form>
                </div>
            </div>
            <div class="thanks" style="display:none;">
                <lord-icon src="https://cdn.lordicon.com/qgtkfluv.json"  trigger="in" delay="300" state="in-reveal" stroke="light" colors="primary:#666,secondary:{{$pcolor}}" style="width:250px;height:250px"></lord-icon>
                <h2>{{$module['form_thanks']}}</h2>
            </div>
        </div>
        </div>
</section>

@if ($module->data['type_button'] == "Confirmar Asistencia")
    @if(!empty ($confirmationUrlForm)) {
        <a href="https://{{$confirmationUrlForm}}" class="linkcontacto" style="background-color:{{$color}}; z-index:1000;" target="_blank"><i class="fa-light {{$module->data['icon_button']}}" style="font-size:24px;"></i></a>
    @else
        <button href="#myModal2" class="linkcontacto modal-button" style="background-color:{{$color}}; border:none; z-index:1000;"><i class="fa-light {{$module->data['icon_button']}}" style="font-size:24px;"></i></button>         
    @endif
@else
    <a href="https://{{$module->data['url_button']}}" class="linkcontacto" style="background-color:{{$color}}; z-index:1000;" target="_blank"><i class="{{$module->data['icon_button']}}" style="font-size:24px;"></i></a>
@endif

{{--    echo '<a href="'.$btnfloatlink.'" class="linkcontacto" style="background-color:'.$btnfloatcolor.'" target="_blank"><i class="'.$btnfloaticon.'"></i></a>'; --}}
@if (!empty($guestC) or !empty($guestN))
    <section class="invites">
        <i class="fa-light {{empty($module->data['icon']) ? 'fa-envelope-open-text' : $module->data['icon']}}"></i>
        <span>Invitación</span>
        @if (!empty($guestN))             
            <h2>{{$guestN}}</h2>
        @endif
        @if (!empty($guestC))
            <p>{{$module->data['signs']}} <b>({{$guestC}})</b></p>
        @endif
    </section>
@endif
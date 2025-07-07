<div class="modal fade rounded-1 modal-md" id="new-invitation-by-event-modal" tabindex="-1" aria-labelledby="new-invitation-by-event-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Nueva invitación</h4>
                <button type="button" class="btn btn-close btn-white rounded-1" data-bs-dismiss="modal" id="close-new-invitation-by-event-modal-btn" aria-label="Close"></button>
            </div>
            <form action="{{route('api.invitations.store-by-event')}}" method="POST" onsubmit="newInvitationByEvent(event, this)" id="new-invitation-by-event-form">
                <div>
                    <div class="p-3">
                        <div class="mb-3">
                            <x-form.select 
                                name="event"
                                label="Evento"
                            >
                                @foreach ($events as $event)
                                    <x-form.select-option
                                        value="{{$event->id}}"
                                        label="{{$event->name}}"
                                    />
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="mb-3">
                            <x-form.select 
                                name="seller"
                                label="Seller"
                            >
                                @foreach ($sellers as $seller)
                                    <x-form.select-option
                                        value="{{$seller->id}}"
                                        label="{{$seller->name}}"
                                    />
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="mb-3">
                            <x-form.input-group label="URL de la nueva invitación" labelFor="path_name">
                                <span class="input-group-text" id="basic-addon3">https://evnt.ar/</span>
                                <x-form.input
                                    id="path_name_input"
                                    name="path_name"                            
                                    extraAttributes="oninput=checkPathName(this)"
                                />
                            </x-form.input-group>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <x-form.button type="submit" classes="btn btn-dark">Crear invitación</x-form.button>
                </div>
            </form>
        </div>
    </div>
</div>
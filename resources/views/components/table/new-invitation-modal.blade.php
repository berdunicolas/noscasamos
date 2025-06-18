<div class="modal fade rounded-1 modal-md" id="new-invitation-modal" tabindex="-1" aria-labelledby="new-invitation-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h4 class="modal-title">Nuevo evento</h4>
          <button type="button" class="btn btn-close btn-white rounded-1" data-bs-dismiss="modal" id="close-modal-btn" aria-label="Close"></button>
        </div>
        <form action="" onsubmit="newInvitation(event)" id="new-invitation-form">
            <div>
                <div class="p-3">
                    <div class="mb-3">
                        <x-form.input
                            name="name"
                            label="Nombre de evento"
                            
                            :errors="(array) $errors->get('name')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.select 
                            name="event"
                            label="Evento"
                        >
                            @foreach ($eventTypes as $eventType)
                                <x-form.select-option
                                    value="{{$eventType}}"
                                    label="{{$eventType}}"
                                />
                            @endforeach
                        </x-form.select>
                    </div>
                    <div class="mb-3">
                        <x-form.select 
                            name="plan"
                            label="Plan"
                        >
                            @foreach ($planTypes as $planType)
                                <x-form.select-option
                                    value="{{$planType}}"
                                    label="{{$planType}}"
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
                </div>

            <div class="modal-footer border-0">
              <x-form.button type="submit" classes="btn btn-dark">Crear evento</x-form.button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade rounded-1 modal-md" id="new-template-modal" tabindex="-1" aria-labelledby="new-template-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Nueva plantilla</h4>
                <button type="button" class="btn btn-close btn-white rounded-1" data-bs-dismiss="modal" id="close-modal-btn" aria-label="Close"></button>
            </div>
            <form action="{{route('api.templates.store')}}" onsubmit="newTemplate(this, event)" id="new-template-form">
                <div>
                    <div class="p-3">
                        <div class="mb-3">
                            <x-form.input
                                name="name"
                                label="Nombre de plantilla"
                                
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
                    </div>
                </div>
                <div class="modal-footer border-0">
                <x-form.button type="submit" classes="btn btn-dark">Crear plantilla</x-form.button>
                </div>
            </form>
        </div>
    </div>
</div>
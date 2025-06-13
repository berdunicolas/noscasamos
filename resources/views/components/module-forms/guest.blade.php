<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Información del invitado</h4>

    <x-module-forms.form :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Titulo"
                type="text"
                placeholder="Invitación"
                value="{{$module->data['tittle']}}"
            />
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"
                    placeholder="fa-envelope-open-text"
                    value="{{$module->data['icon']}}"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="signs"
                    label="Indicaciones de personas"
                    type="text"
                    placeholder="Personas / Pases"
                    value="{{$module->data['signs']}}"
                />
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
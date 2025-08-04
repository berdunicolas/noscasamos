<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Información del invitado</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Titulo"
                type="text"
                
                value="{{$module->data['tittle']}}"
            />
        </div>
        <div class="row mb-3">
            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"
                    
                    value="{{$module->data['icon']}}"
                />
            </div>
            <div class="col-12 col-xl-6">
                <x-form.input
                    name="signs"
                    label="Indicaciones de personas"
                    type="text"
                    
                    value="{{$module->data['signs']}}"
                />
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2" id="save-icon-form"></i>  
                    <span class="spinner-border spinner-border-sm me-2 visually-hidden" aria-hidden="true" id="spinner-icon-form"></span> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
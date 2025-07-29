<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Guardar la fecha</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
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
                    label="Icono botón"
                    type="text"
                    
                    value="{{$module->data['icon']}}"
                />
            </div>
            <div class="col-12 col-xl-6">
                <x-form.input
                    name="text_button"
                    label="Texto botón"
                    type="text"
                    
                    value="{{$module->data['text_button']}}"
                />
            </div>
        </div>
        <div class="mb-3">
            <x-form.input
                name="date_text"
                label="Fecha"
                type="text"
                
                value="{!!$module->data['date_text']!!}"
            />
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" onchange="checkboxSwitch(this, 'is_countdown')" {{$module->data['is_countdown'] ? 'checked' : ''}}>
                <input type="text" hidden name="is_countdown" id="is_countdown" value="{{$module->data['is_countdown'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Cuenta regresiva</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6 col-xl-3 mb-3 mb-xl-0">
                <x-form.input
                    name="days_tanslation"
                    label="Días"
                    type="text"
                    
                    value="{{$module->data['days_tanslation']}}"
                />
            </div>
            <div class="col-6 col-xl-3 mb-3 mb-xl-0">
                <x-form.input
                    name="hr_tanslation"
                    label="Hs"
                    type="text"
                    
                    value="{{$module->data['hr_tanslation']}}"
                />
            </div>
            <div class="col-6 col-xl-3">
                <x-form.input
                    name="min_translation"
                    label="Min"
                    type="text"
                    
                    value="{{$module->data['min_translation']}}"
                />
            </div>
            <div class="col-6 col-xl-3">
                <x-form.input
                    name="sec_translation"
                    label="Seg"
                    type="text"
                    
                    value="{{$module->data['sec_translation']}}"
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
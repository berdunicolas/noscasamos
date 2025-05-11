<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Información del invitado</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Titulo"
                type="text"
                placeholder="Agendá la fecha"
                value="{{$module['tittle']}}"
            />
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono botón"
                    type="text"
                    placeholder="fa-calendar-check"
                    value="{{$module['icon']}}"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="text_button"
                    label="Texto botón"
                    type="text"
                    placeholder="Agendar fecha"
                    value="{{$module['text_button']}}"
                />
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" onchange="checkboxSwitch(this, 'is_countdown')" {{$module['is_countdown'] ? 'checked' : ''}}>
                <input type="text" hidden name="is_countdown" id="is_countdown" value="{{$module['is_countdown'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Cuenta regresiva</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <x-form.input
                    name="days_tanslation"
                    label="Días"
                    type="text"
                    placeholder="DÍAS"
                    value="{{$module['days_tanslation']}}"
                />
            </div>
            <div class="col-3">
                <x-form.input
                    name="hr_tanslation"
                    label="Hs"
                    type="text"
                    placeholder="HS"
                    value="{{$module['hr_tanslation']}}"
                />
            </div>
            <div class="col-3">
                <x-form.input
                    name="min_translation"
                    label="Min"
                    type="text"
                    placeholder="MIN"
                    value="{{$module['min_translation']}}"
                />
            </div>
            <div class="col-3">
                <x-form.input
                    name="sec_translation"
                    label="Seg"
                    type="text"
                    placeholder="SEG"
                    value="{{$module['sec_translation']}}"
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
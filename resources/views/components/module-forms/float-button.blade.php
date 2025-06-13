<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Botón Flotante</h4>

    <x-module-forms.form :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.select
                name="type_button"
                label="Tipo de botón"
                extraAttributes="onchange=changeFloatButton(this)"
            >
                <x-form.select-option
                    value="Confirmar Asistencia"
                    label="Confirmar Asistencia"
                    selected="{{ ($module->data['type_button'] ==  'Confirmar Asistencia') ? true : false }}"
                />
                <x-form.select-option
                    value="Link Personalizado"
                    label="Link Personalizado"
                    selected="{{ ($module->data['type_button'] ==  'Link Personalizado') ? true : false }}"
                />
            </x-form.select>
        </div>

        <div id="icon_input" class="mb-3">
            <x-form.input
                name="icon_button"
                label="Icono"
                value="{{ $module->data['icon_button'] }}"
                placeholder="clipboard-list-check"                
            />
        </div>
        <div id="url_input" class="mb-3">
            <x-form.input
                name="url_button"
                label="URL"
                value="{{ $module->data['url_button'] }}"
                placeholder="https://www.google.com"                
            />
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
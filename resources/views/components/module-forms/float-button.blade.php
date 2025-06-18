<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Botón Flotante</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
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
                                
            />
        </div>
        <div id="url_input" class="mb-3">
            <x-form.input-group label="URL" labelFor="url_button">
                <span class="input-group-text" id="basic-addon3">https://</span>
                <x-form.input
                    name="url_button"
                    value="{{ $module->data['url_button'] }}"
                                    
                />
            </x-form.input-group>
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
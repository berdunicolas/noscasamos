<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Botón Flotante</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
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
                                
                    extraAttributes='list=icons-list'
                />
                @livewire('admin.invitations.editor.icon-data-list', ['invitation' => $module->invitation])
        </div>
        <div id="url_input" class="mb-3">
            <x-form.input
                label="URL"
                name="url_button"
                value="{{ $module->data['url_button'] }}"
                                
            />
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
<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Intro animada</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id" inputName="stamp_image">
        <div class="mb-3">
            <x-form.upload-zone label="Imagen sello sobre" :zoneOwner="$module->name" zoneName="stamp_image" :isMultiple=false>
                @if($module->data['stamp_image'])
                    <div class="preview-item">
                        <img src="{{$module->data['stamp_image']}}" alt="preview">
                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'stamp_image')">×</button>
                    </div>
                @endif
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( [ $module->name => ['stamp_image' => $module->data['stamp_image']]])
            </p>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-intro-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2" id="save-icon-form"></i>  
                    <span class="spinner-border spinner-border-sm me-2 visually-hidden" aria-hidden="true" id="spinner-icon-form"></span> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
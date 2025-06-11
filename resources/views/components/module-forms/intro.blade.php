<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Intro animada</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="mb-3">
            <x-form.upload-zone label="Imagen sello sobre" zoneName="stamp_image" :isMultiple=false>
                @if($module['stamp_image'])
                    <div class="preview-item">
                        <img src="{{$module['stamp_image']}}" alt="preview">
                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'stamp_image', null)">×</button>
                    </div>
                @endif
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( ['stamp_image', $module['stamp_image']])
            </p>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-intro-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
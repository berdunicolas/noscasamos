<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Info</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                placeholder="fa-heart"
                value="{{$module['icon']}}"
            />
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="pre_tittle"
                    label="Antetitulo"
                    type="text"
                    placeholder="Galeria"
                    value="{{$module['pre_tittle']}}"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    type="text"
                    placeholder="Nuestros momentos"
                    value="{{$module['tittle']}}"
                />
            </div>
        </div>
        <div class="mb-3">
            <x-form.upload-zone label="Fotos" zoneName="galery_images" />
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
<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Galeria</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                placeholder="fa-heart"
                value="{{$module->data['icon']}}"
            />
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="pre_tittle"
                    label="Antetitulo"
                    type="text"
                    placeholder="Galeria"
                    value="{{$module->data['pre_tittle']}}"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    type="text"
                    placeholder="Nuestros momentos"
                    value="{{$module->data['tittle']}}"
                />
            </div>
        </div>
        <div class="mb-3">
            <x-form.upload-zone label="Fotos" :zoneOwner="$module->name" zoneName="galery_images" :isMultiple=true>
                @foreach ($module->data['galery_images'] as $key => $image)
                    @if($image)
                        <div class="preview-item">
                            <img src="{{$image}}" alt="preview">
                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'galery_images', {{$key}})">×</button>
                        </div>
                    @endif
                @endforeach
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( [$module->name => ['galery_images' => $module->data['galery_images']]])
            </p>
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
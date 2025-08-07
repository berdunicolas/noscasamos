<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Galeria</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                
                value="{{$module->data['icon']}}"
                extraAttributes='list=icons-list'
            />
            @livewire('admin.invitations.editor.icon-data-list', ['invitation' => $module->invitation])
        </div>
        <div class="row mb-3">
            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                <x-form.input
                    name="pre_tittle"
                    label="Antetitulo"
                    type="text"
                    
                    value="{{$module->data['pre_tittle']}}"
                />
            </div>
            <div class="col-12 col-xl-6">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    type="text"
                    
                    value="{{$module->data['tittle']}}"
                />
            </div>
        </div>
        @if ($isInvitation)            
        <div class="mb-3">
            <x-form.upload-zone label="Fotos" :zoneOwner="$module->name" zoneName="galery_images" :isMultiple=true>
                @foreach ($module->data['galery_images'] as $key => $image)
                    @if($image)
                        <div class="preview-item" data-preview-id="{{$key}}">
                            <img class="preview-img" src="{{$image}}" alt="preview">
                            <button type="button" class="remove-btn" data-index="{{$key}}" onclick="eliminarImagen(this, '{{$module->name}}', 'galery_images')">×</button>
                        </div>
                    @endif
                @endforeach
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( [$module->name => ['galery_images' => $module->data['galery_images']]])
            </p>
        </div>
        @endif
        
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
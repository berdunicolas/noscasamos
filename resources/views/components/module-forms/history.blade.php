<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>{{$module->display_name}}</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                
                value="{{$module->data['icon']}}"
            />
        </div>
        <div class="mb-3">
            <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="history_image" :isMultiple=false>
                @if($module->data['image'])
                    <div class="preview-item">
                        <img src="{{$module->data['image']}}" alt="preview">
                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'history_image')">×</button>
                    </div>
                @endif
            
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( [$module->name => ['history_image' => $module->data['image']]])
            </p>
        </div>
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Título"
                type="text"
                
                value="{{$module->data['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['text']}}</textarea>
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
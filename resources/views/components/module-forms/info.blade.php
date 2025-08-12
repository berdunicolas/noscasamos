<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>{{$module->display_name}}</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                
                value="{{$module->data['icon']}}"
                extraAttributes='list=icons-list'
            />
            @livewire('admin.invitations.editor.icon-data-list', ['model' => $module->ownerModel()])
        </div>
        @if ($isInvitation)            
        <div class="mb-3">
            <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="info_image" :isMultiple=false>
                @if($module->data['image'])
                    <div class="preview-item">
                        <img src="{{$module->data['image']}}" alt="preview">
                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'info_image')">×</button>
                    </div>
                @endif
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( [$module->name => ['info_image' => $module->data['image']]])
            </p>
        </div>
        @endif
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" onchange="checkboxSwitch(this, 'on_t_right_{{$module->name}}')" {{$module->data['on_t_right'] ? 'checked' : ''}}>
                <input type="text" hidden name="on_t_right" id="on_t_right_{{$module->name}}" value="{{$module->data['on_t_right'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Info Derecha</label>
            </div>
        </div>
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Título"
                type="text"
                
                value="{!!$module->data['tittle']!!}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$module->data['text']!!}</textarea>
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
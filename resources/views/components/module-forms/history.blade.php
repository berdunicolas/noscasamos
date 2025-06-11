<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Historia</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName" :displayName="$module['display_name']">
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                placeholder="fa-heart"
                value="{{$module['icon']}}"
            />
        </div>
        <div class="mb-3">
            <x-form.upload-zone label="Imagen" zoneName="history_image" :isMultiple=false>
                @if($module['image'])
                    <div class="preview-item">
                        <img src="{{$module['image']}}" alt="preview">
                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'history_image')">×</button>
                    </div>
                @endif
            
            </x-form.upload-zone>
            <p class="selectedFilesUpdater" hidden>
                @json( ['history_image', $module['image']])
            </p>
        </div>
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Título"
                type="text"
                placeholder="Nuestra historia"
                value="{{$module['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['text']}}</textarea>
        </div>
        {{--<div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="button_icon"
                    label="Icono botón"
                    type="text"
                    placeholder="fa-square-arrow-up-right"
                    value="{{$module['button_icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="button_text"
                        label="Texto botón"
                        type="text"
                        placeholder="Ver más"
                        value="{{$module['button_text']}}"
                    />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <x-form.input
                name="button_url"
                label="Url botton"
                type="text"
                placeholder="https://www.google.com"
                value="{{$module['button_url']}}"
            />
        </div>--}}
        
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Portada</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="mb-3">
            <x-form.select
                name="format"
                label="Formato"
                extraAttributes="onchange=changeCoverFormat(this)"
            >
                <x-form.select-option
                    value="Imagenes"
                    label="Imagenes"
                    selected="{{ ($module['format'] ==  'Imagenes') ? true : false }}"
                />
                <x-form.select-option
                    value="Imagenes con marco"
                    label="Imagenes con marco"
                    selected="{{ ($module['format'] == 'Imagenes con marco') ? true : false }}"
                />
                <x-form.select-option
                    value="Diseño"
                    label="Diseño"
                    selected="{{ ($module['format'] == 'Diseño') ? true : false }}"
                />
                <x-form.select-option
                    value="Diseño con marco"
                    label="Diseño con marco"
                    selected="{{ ($module['format'] == 'Diseño con marco') ? true : false }}"
                />
                <x-form.select-option
                    value="Video"
                    label="Video"
                    selected="{{ ($module['format'] == 'Video') ? true : false }}"
                />
                <x-form.select-option
                    value="Video centrado"
                    label="Video centrado"
                    selected="{{ ($module['format'] == 'Video centrado') ? true : false }}"
                />
            </x-form.select>
        </div>

        <div id="images_format_inputs" class="{{ str_contains('Video centrado', $module['format']) ? 'd-none' : '' }}">
            <div class="mb-3">
                <x-form.upload-zone label="Imágenes desktop" zoneName="images_desktop_cover" />
            </div>
            <div class="mb-3">
                <x-form.upload-zone label="Imágenes mobile" zoneName="images_mobile_cover" />
            </div>
        </div>
        <div id="video_format_inputs" class="{{ str_contains('Imagenes con marco', $module['format']) ? 'd-none' : '' }}">
            <div class="row mb-3">
                <div class="col-6">
                    <x-form.input
                        id="desktop_video"
                        name="desktop_video"
                        label="Video desktop"
                        type="file"
                    />
                </div>
                <div class="col-6">
                    <x-form.input
                        id="mobile_video"
                        name="mobile_video"
                        label="Video movile"
                        type="file"
                    />
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-3">
            <div class="ms-2 col-3 form-check form-switch">
                <input class="form-check-input" onchange="checkboxSwitch(this, 'active_header')" type="checkbox" role="switch" {{$module['active_header'] ? 'checked' : ''}}>
                <input type="text" hidden name="active_header" id="active_header" value="{{$module['active_header'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Usar cabecera</label>
            </div>
            <div class="col-3 form-check form-switch">
                <input class="form-check-input" onchange="checkboxSwitch(this, 'active_logo')" type="checkbox" role="switch" {{$module['active_logo'] ? 'checked' : ''}}>
                <input type="text" hidden name="active_logo" id="active_logo" value="{{$module['active_logo'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Usar logotipo</label>
            </div>
            <div class="col-4 form-check form-switch">
                <input class="form-check-input" onchange="checkboxSwitch(this, 'active_central')" type="checkbox" role="switch" {{$module['active_central'] ? 'checked' : ''}}>
                <input type="text" hidden name="active_central" id="active_central" value="{{$module['active_central'] ? 1 : 0}}">
                <label class="form-check-label" for="switchCheckChecked">Usar imagen central</label>
            </div>
        </div>
        
        
        <div class="row mb-3">
            <div class="col-8">
                <x-form.input
                    name="names"
                    label="Nombres"
                    value="{{ $module['names'] }}"
                    placeholder="Juan & Micaela"
                />
            </div>
            <div class="col-4">
                <x-form.color-picker
                    id="text-color-cover"
                    name="text_color_cover"
                    label="Color texto"
                    value="{{$module['text_color_cover']}}"
                />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    value="{{ $module['tittle'] }}"
                    placeholder="¡Nos Casamos!"
                />
            </div>
            <div class="col-8">
                <x-form.input
                    name="detail"
                    label="Bajada"
                    value="{{ $module['detail'] }}"
                    placeholder="Y queremos compartirlo con vos"
                />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="logo_cover"
                    label="Logotipo"
                    type="file"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="central_image_cover"
                    label="Imagen central"
                    type="file"
                />
            </div>
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
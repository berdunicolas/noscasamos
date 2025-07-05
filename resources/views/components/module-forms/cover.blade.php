<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Portada</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.select
                name="format"
                label="Formato"
                extraAttributes="onchange=changeCoverFormat(this)"
            >
                <x-form.select-option
                    value="Imagenes"
                    label="Imagenes"
                    selected="{{ ($module->data['format'] ==  'Imagenes') ? true : false }}"
                />
                <x-form.select-option
                    value="Imagenes con marco"
                    label="Imagenes con marco"
                    selected="{{ ($module->data['format'] == 'Imagenes con marco') ? true : false }}"
                />
                <x-form.select-option
                    value="Diseño"
                    label="Diseño"
                    selected="{{ ($module->data['format'] == 'Diseño') ? true : false }}"
                />
                <x-form.select-option
                    value="Diseño con marco"
                    label="Diseño con marco"
                    selected="{{ ($module->data['format'] == 'Diseño con marco') ? true : false }}"
                />
                <x-form.select-option
                    value="Video"
                    label="Video"
                    selected="{{ ($module->data['format'] == 'Video') ? true : false }}"
                />
                <x-form.select-option
                    value="Video centrado"
                    label="Video centrado"
                    selected="{{ ($module->data['format'] == 'Video centrado') ? true : false }}"
                />
            </x-form.select>
        </div>

        <div id="images_format_inputs" class="{{ str_contains('Imagenes con marco', $module->data['format']) ? '' : 'd-none' }}">
            <div class="mb-3">
                <x-form.upload-zone label="Imágenes desktop" :zoneOwner="$module->name" zoneName="images_desktop_cover" :isMultiple=true>
                    @foreach ($module->data['desktop_images'] as $key => $image)
                        @if($image)
                            <div class="preview-item">
                                <img class="preview-img" src="{{$image}}" alt="preview">
                                <button type="button" class="remove-btn" data-index="{{$key}}" onclick="eliminarImagen(this, '{{$module->name}}', 'images_desktop_cover')">×</button>
                            </div>
                        @endif
                    @endforeach
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( [$module->name => ['images_desktop_cover' => $module->data['desktop_images']]])
                </p>
            </div>
            <div class="mb-3">
                <x-form.upload-zone label="Imágenes mobile" :zoneOwner="$module->name" zoneName="images_mobile_cover" :isMultiple=true>
                    @foreach ($module->data['mobile_images'] as $key => $image)
                        @if($image)
                            <div class="preview-item">
                                <img class="preview-img" src="{{$image}}" alt="preview">
                                <button type="button" class="remove-btn" data-index="{{$key}}" onclick="eliminarImagen(this, '{{$module->name}}', 'images_mobile_cover')">×</button>
                            </div>
                        @endif
                    @endforeach
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( [$module->name => ['images_mobile_cover' => $module->data['mobile_images']]])
                </p>
            </div>
        </div>
        <div id="design_format_inputs" class="{{ str_contains('Diseño con marco', $module->data['format']) ? '' : 'd-none' }}">
            <div class="row mb-3">
                <div class="col-6">
                    <x-form.upload-zone label="Diseño desktop" :zoneOwner="$module->name" zoneName="design_desktop_cover" :isMultiple=false>
                        @if($module->data['desktop_design'])
                            <div class="preview-item">
                                <img src="{{$module->data['desktop_design']}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'design_desktop_cover')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( [$module->name => ['design_desktop_cover' => $module->data['desktop_design']]])
                    </p>
                </div>
                <div class="col-6">
                    <x-form.upload-zone label="Diseño mobile" :zoneOwner="$module->name" zoneName="design_mobile_cover" :isMultiple=false>
                        @if($module->data['mobile_design'])
                            <div class="preview-item">
                                <img src="{{$module->data['mobile_design']}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'design_mobile_cover')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( [$module->name => ['design_mobile_cover' => $module->data['mobile_design']]])
                    </p>
                </div>
            </div>
        </div>
        <div id="video_format_inputs" class="{{ str_contains('Video centrado', $module->data['format']) ? '' : 'd-none' }}">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="desktop_video">Video desktop</label>
                    <div class="input-group mb-3">
                        <input type="file" id="desktop_video" onchange="videoPreview(this)" name="desktop_video" data-url="{{$module->data['desktop_video']}}" accept="video/*" class="form-control videoInput">
                        <button class="btn btn-outline-danger" onclick="deleteVideoFromInput('desktop_video')" type="button" id="button-addon2"><i class="fa-light fa-xmark"></i></button>
                    </div>
                    <div class="mt-2">
                        <video id="desktop_video_preview" height="0" class="m-2" video muted playsinline></video>
                    </div>
                </div>
                <div class="col-6">
                    <label for="mobile_video">Video movile</label>
                    
                    <div class="input-group mb-3">
                        <input type="file" id="mobile_video" onchange="videoPreview(this)" name="mobile_video" data-url="{{$module->data['mobile_video']}}" accept="video/*" class="form-control videoInput">
                        <button class="btn btn-outline-danger" onclick="deleteVideoFromInput('mobile_video')" type="button" id="button-addon2"><i class="fa-light fa-xmark"></i></button>
                    </div>
                    <div class="mt-2">
                        <video id="mobile_video_preview" height="0" class="m-2" video muted playsinline></video>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-3">
            <div class="ms-2 col-3 form-check form-switch">
                <input class="form-check-input" onchange="checkboxSwitch(this, 'active_header')" type="checkbox" role="switch" {{$module->data['active_header'] ? 'checked' : ''}}>
                <input type="text" hidden name="active_header" id="active_header" value="{{$module->data['active_header'] ? 1 : 0}}">
                <label class="form-check-label text-nowrap" for="">Usar cabecera</label>
            </div>
        </div>
        
        
        <div class="row mb-3">
            <div class="col-12 col-xl-8 mb-3 mb-xl-0">
                <x-form.input
                    name="names"
                    label="Nombres"
                    value="{{( empty($module->data['names'])) ? $hostNames : $module->data['names']}}"
                    
                />
            </div>
            <div class="col-12 col-xl-4">
                <x-form.color-picker
                    id="text-color-cover"
                    name="text_color_cover"
                    label="Color texto"
                    value="{{$module->data['text_color_cover']}}"
                />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-xl-4 mb-3 mb-xl-0">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    value="{{ $module->data['tittle'] }}"
                    
                />
            </div>
            <div class="col-12 col-xl-8">
                <x-form.input
                    name="detail"
                    label="Bajada"
                    value="{{ $module->data['detail'] }}"
                    
                />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                <div class="form-check form-switch">
                    <input class="form-check-input" onchange="checkboxSwitch(this, 'active_logo')" type="checkbox" role="switch" {{$module->data['active_logo'] ? 'checked' : ''}}>
                    <input type="text" hidden name="active_logo" id="active_logo" value="{{$module->data['active_logo'] ? 1 : 0}}">
                    <label class="form-check-label" for="">Usar logotipo</label>
                </div>
                <x-form.upload-zone :zoneOwner="$module->name" zoneName="logo_cover" :isMultiple=false>
                    @if($module->data['logo_cover'])
                        <div class="preview-item">
                            <img src="{{$module->data['logo_cover']}}" alt="preview">
                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'logo_cover')">×</button>
                        </div>
                    @endif
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( [$module->name => ['logo_cover' => $module->data['logo_cover']]])
                </p>
            </div>
            <div class="col-12 col-xl-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" onchange="checkboxSwitch(this, 'active_central')" type="checkbox" role="switch" {{$module->data['active_central'] ? 'checked' : ''}}>
                    <input type="text" hidden name="active_central" id="active_central" value="{{$module->data['active_central'] ? 1 : 0}}">
                    <label class="form-check-label" for="">Usar imagen central</label>
                </div>
                <x-form.upload-zone :zoneOwner="$module->name" zoneName="central_image_cover" :isMultiple=false>
                    @if($module->data['central_image_cover'])
                        <div class="preview-item">
                            <img src="{{$module->data['central_image_cover']}}" alt="preview">
                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'central_image_cover')">×</button>
                        </div>
                    @endif
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( [$module->name => ['central_image_cover' => $module->data['central_image_cover']]])
                </p>
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
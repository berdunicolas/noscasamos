<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Portada</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="row mb-3">
            <div class="col-4">
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
                        value="Video"
                        label="Video"
                        selected="{{ ($module['format'] ==  'Video') ? true : false }}"
                    />
                </x-form.select>
            </div>
            <div class="col-4">
                <x-form.select
                    name="frame_type"
                    label="Tipo de marco"
                >
                    <x-form.select-option
                        value="Fullscreen"
                        label="Fullscreen"
                        selected="{{ ($module['frame_type'] ==  'Fullscreen') ? true : false }}"
                    />
                </x-form.select>
            </div>
            <div class="col-4">
                <x-form.select
                    name="align"
                    label="Alineación"
                >
                    <x-form.select-option
                        value="Centrado"
                        label="Centrado"
                        selected="{{ ($module['align'] ==  'Centrado') ? true : false }}"
                    />
                </x-form.select>
            </div>
        </div>

        <div id="images_format_inputs" class="{{ ($module['format'] ==  'Video') ? 'd-none' : '' }}">
            <div class="mb-3">
                <x-form.input
                    id="desktop_images"
                    name="desktop_images"
                    label="Imágenes desktop"
                    type="file"
                />
            </div>
            <div class="mb-3">
                <x-form.input
                    id="mobile_images"
                    name="mobile_images"
                    label="Imágenes mobile"
                    type="file"
                />
            </div>
        </div>
        <div id="video_format_inputs" class="{{ ($module['format'] ==  'Imagenes' || empty($module['format']) ) ? 'd-none' : '' }}">
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


        <div class="row mb-3">
            <div class="col-4">
                <x-form.input
                    name="tittle"
                    label="Titulo"
                    value="{{ $module['tittle'] }}"
                    placeholder="¡Nos Casamos!"
                />
            </div>
            <div class="col-4">
                <x-form.input
                    name="detail"
                    label="Bajada"
                    value="{{ $module['detail'] }}"
                    placeholder="Y queremos compartirlo con vos"
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

        <div class="mb-3">
            <x-form.input
                name="logo_cover"
                label="Usar logotipo"
                type="file"
            />
        </div>
        <div class="mb-3">
            <x-form.input
                name="central_image_cover"
                label="Usar imagen central"
                type="file"
            />
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
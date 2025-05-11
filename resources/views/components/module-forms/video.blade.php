<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Video</h4>

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
                    placeholder="Video"
                    value="{{$module['pre_tittle']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="tittle"
                        label="Título"
                        type="text"
                        placeholder="El momento del si."
                        value="{{$module['tittle']}}"
                    />
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <x-form.input
                    name="video_id"
                    label="ID de video"
                    type="text"
                    placeholder="kejhsefg"
                    value="{{$module['video_id']}}"
                />
            </div>
            <div class="col-4">
                <x-form.select
                    name="type_video"
                    label="Tipo de video"
                >
                    <x-form.select-option
                        value="Youtube"
                        label="Youtube"
                        selected="{{ ($module['type_video'] ==  'Youtube') ? true : false }}"
                    />
                    <x-form.select-option
                        value="Vimeo"
                        label="Vimeo"
                        selected="{{ ($module['type_video'] ==  'Vimeo') ? true : false }}"
                    />
                </x-form.select>
            </div>
            <div class="col-4">
                <x-form.select
                    name="format"
                    label="Formato"
                >
                    <x-form.select-option
                        value="Horizontal"
                        label="Horizontal"
                        selected="{{ ($module['format'] ==  'Horizontal') ? true : false }}"
                    />
                    <x-form.select-option
                        value="Vertical"
                        label="Vertical"
                        selected="{{ ($module['format'] ==  'Vertical') ? true : false }}"
                    />
                </x-form.select>
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
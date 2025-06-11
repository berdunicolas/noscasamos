<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Video</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
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
                    id="video_id"
                    name="video_id"
                    label="ID de video"
                    type="text"
                    placeholder="kejhsefg"
                    value="{{$module['video_id']}}"
                    extraAttributes="onchange=changeVideoId(this)"
                />
            </div>
            <div class="col-4">
                <x-form.select
                    name="type_video"
                    label="Tipo de video"
                    extraAttributes="onchange=changePlayerFrame(this)"
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
                    extraAttributes="onchange=changePlayerDirection(this)"
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

        <section class="video p-4">
            <div class="videoPlayer {{($module['format'] == 'Horizontal') ? 'h' : 'v'}}" id="player">
                <div class="player" id="youtube-player" style="background-color:none;" {{(strtolower($module['type_video']) == "youtube") ? '' : 'hidden' }}>
                    <iframe src="https://www.youtube-nocookie.com/embed/{{$module['video_id']}}?si=7CQt0gnEV97CNWwW&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen  style="border-radius:8px;"></iframe>
                </div>
                <div class="player" id="vimeo-player" {{(strtolower($module['type_video']) == "vimeo") ? '' : 'hidden'}}>
                    <iframe src="https://player.vimeo.com/video/{{$module['video_id']}}?h=b86574a207&autoplay=1&color=A2AE8C&title=0&byline=0&portrait=0" width="640" height="1138" frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen  style="border-radius:8px;"></iframe>
                </div>
            </div>
        </section>
        
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
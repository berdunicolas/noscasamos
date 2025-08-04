<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Musica</h4>

    @if($isInvitation)
    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="mb-3">
            <label for="song">Musica</label>
            <div class="input-group mb-3">
                <input type="file" id="song" onchange="audioPreview(this)" name="song" data-url="{{$module->data['song']}}" accept="audio/*" class="form-control audioInput">
                <button class="btn btn-outline-danger" onclick="deleteAudioFromInput('song')" type="button" id="button-addon2"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="mt-2">
                <audio id="song_preview" controls class="w-100 m-2"></audio>
            </div>
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
    @endif
</div>
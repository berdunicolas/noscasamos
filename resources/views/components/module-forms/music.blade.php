<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Musica</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
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
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
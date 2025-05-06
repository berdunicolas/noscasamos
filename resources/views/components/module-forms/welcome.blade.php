<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Bienvenida</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">

        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono botón"
                    type="text"
                    placeholder="fa-calendar-check"
                    value="{{$module['icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="image"
                        label="Imagen"
                        type="file"
                    />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Título"
                type="text"
                placeholder="!Bienvenidos!"
                value="{{$module['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Te invitamos a celebrar con nosotros..." class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['text']}}</textarea>
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
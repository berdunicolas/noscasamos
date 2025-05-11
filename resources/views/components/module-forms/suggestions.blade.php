<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Sugerencias</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="pre_tittle"
                    label="Ante título"
                    type="text"
                    placeholder="Sugerencias"
                    value="{{$module['pre_tittle']}}"
                />
            </div>
            <div class="col-6">
                <x-form.input
                    name="tittle"
                    label="Título"
                    type="text"
                    placeholder="Alojamientos"
                    value="{{$module['tittle']}}"
                />
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="¿Estas de visita en la ciudad?<br>Te recomendamos algunos lugares para hospedarte." class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['text']}}</textarea>
        </div>
        <div class="mb-3">
            <x-form.input
                name="icon"
                label="Icono"
                type="text"
                placeholder="fa-heart"
                value="{{$module['icon']}}"
            />
        </div>
        @foreach ($module['suggestions'] as $key => $suggestion)            
            <div class="row mb-3">
                <div class="col-6">
                    <x-form.input
                        name="{{'suggestion_' . ($key+1)}}"
                        label="Sugerencia {{$key+1}}"
                        type="text"
                        placeholder="Hotel Hilton"
                        value="{{$suggestion['suggestion_' . ($key+1)]}}"
                    />
                </div>
                <div class="col-6">
                    <x-form.input
                        name="{{'link_' . ($key+1)}}"
                        label="Link sugerencia {{$key+1}}"
                        type="text"
                        placeholder="https://maps.google.com"
                        value="{{$suggestion['link_' . ($key+1)]}}"
                    />
                </div>
            </div>
        @endforeach

        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
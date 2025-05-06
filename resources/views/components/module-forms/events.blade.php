<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Eventos</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Civíl</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'civil_active')" type="checkbox" role="switch" {{$module['civil']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="civil_active" id="civil_active" value="{{$module['civil']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-5">
                                <x-form.input
                                    name="civil_event"
                                    label="Evento"
                                    type="text"
                                    placeholder="Civil"
                                    value="{{$module['civil']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="civil_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['civil']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="civil_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['civil']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="civil_date"
                                    label="Fecha"
                                    type="date"
                                    placeholder="29/12/2025"
                                    value="{{$module['civil']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="civil_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['civil']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="civil_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['civil']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="civil_name"
                                label="Nombre"
                                type="text"
                                placeholder="Registro civil de Palermo"
                                value="{{$module['civil']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="civil_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['civil']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="civil_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <label class="form-check-label" for="switchCheckChecked">Ceremonia</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'ceremony_active')" type="checkbox" role="switch" {{$module['ceremony']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="ceremony_active" id="ceremony_active" value="{{$module['ceremony']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-5">
                                <x-form.input
                                    name="ceremony_event"
                                    label="Evento"
                                    type="text"
                                    placeholder="Ceremonia"
                                    value="{{$module['ceremony']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="ceremony_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['ceremony']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="ceremony_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['ceremony']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="ceremony_date"
                                    label="Fecha"
                                    type="date"
                                    placeholder="29/12/2025"
                                    value="{{$module['ceremony']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="ceremony_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['ceremony']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="ceremony_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['ceremony']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ceremony_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['ceremony']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="ceremony_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['ceremony']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ceremony_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-check-label" for="switchCheckChecked">Festejo</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'party_active')" role="switch" {{$module['party']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="party_active" id="party_active" value="{{$module['party']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-5">
                                <x-form.input
                                    name="party_event"
                                    label="Evento"
                                    type="text"
                                    placeholder="Fiesta"
                                    value="{{$module['party']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="party_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['party']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="party_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['party']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="party_date"
                                    label="Fecha"
                                    type="date"
                                    placeholder="29/12/2025"
                                    value="{{$module['party']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="party_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['party']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="party_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['party']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="party_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['party']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="party_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['party']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="party_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Dresscode</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'dresscode_active')" type="checkbox" role="switch" {{$module['dresscode']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="dresscode_active" id="dresscode_active" value="{{$module['dresscode']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-5">
                                <x-form.input
                                    name="dresscode_event"
                                    label="Evento"
                                    type="text"
                                    placeholder="Dresscode"
                                    value="{{$module['dresscode']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="dresscode_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['dresscode']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="dresscode_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['dresscode']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="dresscode_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['dresscode']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="dresscode_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['dresscode']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="dresscode_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                    </div>
                </div>
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
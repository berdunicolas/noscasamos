<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Eventos</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Civíl</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'civil_active')" type="checkbox" role="switch" {{$module['events']['civil']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="civil_active" id="civil_active" value="{{$module['events']['civil']['active'] ? 1 : 0}}">
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
                                    value="{{$module['events']['civil']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="civil_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['events']['civil']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="civil_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['events']['civil']['order']}}"
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
                                    value="{{$module['events']['civil']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="civil_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['events']['civil']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="civil_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['events']['civil']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="civil_name"
                                label="Nombre"
                                type="text"
                                placeholder="Registro civil de Palermo"
                                value="{{$module['events']['civil']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="civil_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['events']['civil']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="civil_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="civil_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module['events']['civil']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="civil_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module['events']['civil']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <label class="form-check-label" for="switchCheckChecked">Ceremonia</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'ceremony_active')" type="checkbox" role="switch" {{$module['events']['ceremony']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="ceremony_active" id="ceremony_active" value="{{$module['events']['ceremony']['active'] ? 1 : 0}}">
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
                                    value="{{$module['events']['ceremony']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="ceremony_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['events']['ceremony']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="ceremony_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['events']['ceremony']['order']}}"
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
                                    value="{{$module['events']['ceremony']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="ceremony_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['events']['ceremony']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="ceremony_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['events']['ceremony']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ceremony_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['events']['ceremony']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="ceremony_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['events']['ceremony']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ceremony_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="ceremony_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module['events']['ceremony']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="ceremony_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module['events']['ceremony']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-check-label" for="switchCheckChecked">Festejo</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'party_active')" role="switch" {{$module['events']['party']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="party_active" id="party_active" value="{{$module['events']['party']['active'] ? 1 : 0}}">
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
                                    value="{{$module['events']['party']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="party_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['events']['party']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="party_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['events']['party']['order']}}"
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
                                    value="{{$module['events']['party']['date']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="party_time"
                                    label="Hora"
                                    type="time"
                                    placeholder="20:00"
                                    value="{{$module['events']['party']['time']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="party_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    placeholder="Horas"
                                    value="{{$module['events']['party']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="party_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['events']['party']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="party_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['events']['party']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="party_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="party_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module['events']['party']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="party_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module['events']['party']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Dresscode</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'dresscode_active')" type="checkbox" role="switch" {{$module['events']['dresscode']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="dresscode_active" id="dresscode_active" value="{{$module['events']['dresscode']['active'] ? 1 : 0}}">
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
                                    value="{{$module['events']['dresscode']['event']}}"
                                />
                            </div>
                            <div class="col-5">
                                <x-form.input
                                    name="dresscode_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module['events']['dresscode']['icon']}}"
                                />
                            </div>
                            <div class="col-2">
                                <x-form.input
                                    name="dresscode_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module['events']['dresscode']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="dresscode_name"
                                label="Nombre"
                                type="text"
                                placeholder="Parroquia San Benito"
                                value="{{$module['events']['dresscode']['name']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="dresscode_detail" placeholder="Belgrano 550, S.M. de Tucumán" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['events']['dresscode']['detail']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="dresscode_image"
                                label="Imagen"
                                type="file"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="dresscode_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module['events']['dresscode']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="dresscode_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module['events']['dresscode']['button_text']}}"
                                    />
                                </div>
                            </div>
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
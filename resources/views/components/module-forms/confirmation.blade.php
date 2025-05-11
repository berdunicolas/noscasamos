<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Confirmación</h4>

    <x-module-forms.form :invitationId="$invitationId" :moduleName="$moduleName">
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"
                    placeholder="fa-gift"
                    value="{{$module['icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="pre_tittle"
                        label="Antetitulo"
                        type="text"
                        placeholder="RSVP"
                        value="{{$module['pre_tittle']}}"
                    />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <x-form.input
                name="tittle"
                label="Titulo"
                type="text"
                placeholder="Confirmar asistencia"
                value="{{$module['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['text']}}</textarea>
        </div>
        <div class="mb-3">
            <x-form.input
                name="limit_date"
                label="Limite de confirmación   "
                type="date"
                value="{{$module['limit_date']}}"
            />
        </div>

        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Formulario</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'form_active')" type="checkbox" role="switch" {{$module['form']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="form_active" id="form_active" value="{{$module['form']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <label class="form-check-label" for="switchCheckChecked">Botón 1</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'first_button_active')" type="checkbox" role="switch" {{$module['first_button']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="first_button_active" id="first_button_active" value="{{$module['first_button']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-check-label" for="switchCheckChecked">Botón 2</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'second_button_active')" role="switch" {{$module['second_button']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="second_button_active" id="second_button_active" value="{{$module['second_button']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Valor tarjeta</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'card_value_active')" type="checkbox" role="switch" {{$module['card_value']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="card_value_active" id="card_value_active" value="{{$module['card_value']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
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
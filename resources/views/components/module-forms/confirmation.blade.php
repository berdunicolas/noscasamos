<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Confirmación</h4>

    <x-module-forms.form :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"
                    placeholder="fa-gift"
                    value="{{$module->data['icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="pre_tittle"
                        label="Antetitulo"
                        type="text"
                        placeholder="RSVP"
                        value="{{$module->data['pre_tittle']}}"
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
                value="{{$module->data['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['text']}}</textarea>
        </div>
        <div class="mb-3">
            <x-form.input
                name="limit_date"
                label="Limite de confirmación"
                value="{{$module->data['limit_date']}}"
                placeholder="Tenés tiempo hasta el 20 de Marzo."
            />
        </div>

        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Valor tarjeta</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'card_active')" type="checkbox" role="switch" {{$module->data['card_active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="card_active" id="card_active" value="{{$module->data['card_active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="card_tittle"
                                label="Titulo"
                                type="text"
                                placeholder="Valor de tarjeta"
                                value="{{$module->data['card_tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="card_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['card_text']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="card_button_text"
                                label="Texto boton"
                                type="text"
                                placeholder="Cómo abonar"
                                value="{{$module->data['card_button_text']}}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Formulario</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'form_active')" type="checkbox" role="switch" {{$module->data['form_active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="form_active" id="form_active" value="{{$module->data['form_active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_button_text"
                                    label="Texto boton"
                                    type="text"
                                    placeholder="Confirmár asistencia"
                                    value="{{$module->data['form_button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_button_url"
                                    label="Link boton"
                                    type="text"
                                    placeholder="forms.google.com"
                                    value="{{$module->data['form_button_url']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="form_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['form_text']}}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_ill_attend"
                                    label="Asistiré"
                                    type="text"
                                    placeholder="Asistiré"
                                    value="{{$module->data['form_ill_attend']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_ill_n_attend"
                                    label="No asistiré"
                                    type="text"
                                    placeholder="No asistiré"
                                    value="{{$module->data['form_ill_n_attend']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_name"
                                label="Nombre"
                                type="text"
                                placeholder="Apellido y nombre"
                                value="{{$module->data['form_name']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_email"
                                    label="Email"
                                    type="text"
                                    placeholder="Correo electronico"
                                    value="{{$module->data['form_email']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_phone"
                                    label="Teléfono"
                                    type="text"
                                    placeholder="Teléfono"
                                    value="{{$module->data['form_phone']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_special_menu"
                                label="Menu especial"
                                type="text"
                                placeholder="¿Necesitas un menu especial?"
                                value="{{$module->data['form_special_menu']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="form_nothing"
                                    label="Ninguno"
                                    type="text"
                                    placeholder="Ninguno"
                                    value="{{$module->data['form_nothing']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu1"
                                    label="Menu 1"
                                    type="text"
                                    placeholder="Celiaco"
                                    value="{{$module->data['form_menu1']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu2"
                                    label="Menu 2"
                                    type="text"
                                    placeholder="Vegetariano"
                                    value="{{$module->data['form_menu2']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu3"
                                    label="Menu 3"
                                    type="text"
                                    placeholder="Vegano"
                                    value="{{$module->data['form_menu3']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu4"
                                    label="Menu 4"
                                    type="text"
                                    placeholder="Diabetico"
                                    value="{{$module->data['form_menu4']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu5"
                                    label="Menu 5"
                                    type="text"
                                    placeholder="Kosher"
                                    value="{{$module->data['form_menu5']}}"
                                />
                            </div>
                        </div>

                        <div class="mb-3">
                            <x-form.input
                                name="form_transfer"
                                label="Traslado"
                                type="text"
                                placeholder="¿Necesitas traslado?"
                                value="{{$module->data['form_transfer']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_option1"
                                    label="Opción 1"
                                    type="text"
                                    placeholder="No, voy por mis medios"
                                    value="{{$module->data['form_option1']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_option2"
                                    label="Opción 2"
                                    type="text"
                                    placeholder="Si, necesito traslado"
                                    value="{{$module->data['form_option2']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_option3"
                                    label="Opción 3"
                                    type="text"
                                    value="{{$module->data['form_option3']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_option4"
                                    label="Opción 4"
                                    type="text"
                                    value="{{$module->data['form_option4']}}"
                                />
                            </div>
                        </div>

                        <div class="mb-3">
                            <x-form.input
                                name="form_companions"
                                label="Acompañantes"
                                type="text"
                                placeholder="Nombre y apellido de acompañantes (si corresponde)"
                                value="{{$module->data['form_companions']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_comments"
                                label="Comentarios"
                                type="text"
                                placeholder="Comentarios o mensajes"
                                value="{{$module->data['form_comments']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_errors"
                                label="Errores de formulario"
                                type="text"
                                placeholder="Por favor completa todos los campos"
                                value="{{$module->data['form_errors']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_thanks"
                                label="Gracias"
                                type="text"
                                placeholder="¡Gracias por confirmar asistencia!"
                                value="{{$module->data['form_thanks']}}"
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
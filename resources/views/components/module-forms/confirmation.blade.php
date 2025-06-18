<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Confirmación</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"
                    
                    value="{{$module->data['icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="pre_tittle"
                        label="Antetitulo"
                        type="text"
                        
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
                
                value="{{$module->data['tittle']}}"
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['text']}}</textarea>
        </div>
        <div class="mb-3">
            <x-form.input
                name="limit_date"
                label="Limite de confirmación"
                value="{{$module->data['limit_date']}}"
                
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
                                
                                value="{{$module->data['card_tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="card_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['card_text']}}</textarea>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="card_button_text"
                                label="Texto boton"
                                type="text"
                                
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
                                    
                                    value="{{$module->data['form_button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_button_url"
                                    label="Link boton"
                                    type="text"
                                    
                                    value="{{$module->data['form_button_url']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="form_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['form_text']}}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_ill_attend"
                                    label="Asistiré"
                                    type="text"
                                    
                                    value="{{$module->data['form_ill_attend']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_ill_n_attend"
                                    label="No asistiré"
                                    type="text"
                                    
                                    value="{{$module->data['form_ill_n_attend']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_name"
                                label="Nombre"
                                type="text"
                                
                                value="{{$module->data['form_name']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_email"
                                    label="Email"
                                    type="text"
                                    
                                    value="{{$module->data['form_email']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_phone"
                                    label="Teléfono"
                                    type="text"
                                    
                                    value="{{$module->data['form_phone']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_special_menu"
                                label="Menu especial"
                                type="text"
                                
                                value="{{$module->data['form_special_menu']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <x-form.input
                                    name="form_nothing"
                                    label="Ninguno"
                                    type="text"
                                    
                                    value="{{$module->data['form_nothing']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu1"
                                    label="Menu 1"
                                    type="text"
                                    
                                    value="{{$module->data['form_menu1']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu2"
                                    label="Menu 2"
                                    type="text"
                                    
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
                                    
                                    value="{{$module->data['form_menu3']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu4"
                                    label="Menu 4"
                                    type="text"
                                    
                                    value="{{$module->data['form_menu4']}}"
                                />
                            </div>
                            <div class="col-4">
                                <x-form.input
                                    name="form_menu5"
                                    label="Menu 5"
                                    type="text"
                                    
                                    value="{{$module->data['form_menu5']}}"
                                />
                            </div>
                        </div>

                        <div class="mb-3">
                            <x-form.input
                                name="form_transfer"
                                label="Traslado"
                                type="text"
                                
                                value="{{$module->data['form_transfer']}}"
                            />
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="form_option1"
                                    label="Opción 1"
                                    type="text"
                                    
                                    value="{{$module->data['form_option1']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="form_option2"
                                    label="Opción 2"
                                    type="text"
                                    
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
                                
                                value="{{$module->data['form_companions']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_comments"
                                label="Comentarios"
                                type="text"
                                
                                value="{{$module->data['form_comments']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_errors"
                                label="Errores de formulario"
                                type="text"
                                
                                value="{{$module->data['form_errors']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_thanks"
                                label="Gracias"
                                type="text"
                                
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
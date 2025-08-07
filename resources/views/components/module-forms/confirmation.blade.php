<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Confirmación</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="icon"
                    label="Icono"
                    type="text"  
                    value="{{$module->data['icon']}}"
                    extraAttributes='list=icons-list'
                />
                @livewire('admin.invitations.editor.icon-data-list', ['invitation' => $module->invitation])
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
                value="{!!$module->data['limit_date']!!}"
                
            />
        </div>

        <div class="accordion accordion-flush mt-2">
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="">Valor tarjeta</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-card-form', 'card_active')" type="checkbox" role="switch" {{$module->data['card_active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="card_active" id="card_active" value="{{$module->data['card_active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-card-form" class="accordion-collapse collapse {{$module->data['card_active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="card_tittle"
                                label="Titulo"
                                type="text"
                                value="{!!$module->data['card_tittle']!!}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="card_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$module->data['card_text']!!}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                <x-form.input
                                    name="card_button_text"
                                    label="Texto boton"
                                    type="text"
                                    value="{{$module->data['card_button_text']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-6">
                                <x-form.input
                                    label="Url boton"
                                    name="card_button_url"
                                    type="text"
                                    value="{{$module->data['card_button_url']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="">Boton de asistencia</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-attend-form', 'form_active')" type="checkbox" role="switch" {{$module->data['form_active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="form_active" id="form_active" value="{{$module->data['form_active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-attend-form" class="accordion-collapse collapse {{$module->data['form_active'] ? 'show' : ''}}">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.select
                                name="form_type"
                                label="Confirmar por"
                                extraAttributes="onchange=changeConfirmationForm(this)"
                            >
                                <x-form.select-option
                                    value="form"
                                    label="Formulario de asistencia"
                                    selected="{{ ($module->data['form_type'] ==  'form') ? true : false }}"
                                />
                                <x-form.select-option
                                    value="link"
                                    label="Link de confirmación"
                                    selected="{{ ($module->data['form_type'] ==  'link') ? true : false }}"
                                />
                            </x-form.select>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="form_button_text"
                                label="Texto boton"
                                type="text"
                                
                                value="{{$module->data['form_button_text']}}"
                            />
                        </div>
                        <div id="confirmation-link-form" class="mb-3 {{($module->data['form_type'] == 'form') ? 'd-none' : ''}}">
                            <x-form.input
                                label="Link boton"
                                name="form_button_url"
                                type="text"
                                value="{{$module->data['form_button_url']}}"
                            />
                        </div>

                        <div id="confirmation-form-form" class="{{($module->data['form_type'] == 'link') ? 'd-none' : ''}}">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                                <textarea name="form_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$module->data['form_text']!!}</textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_ill_attend"
                                        label="Asistiré"
                                        type="text"
                                        
                                        value="{{$module->data['form_ill_attend']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_email"
                                        label="Email"
                                        type="text"
                                        
                                        value="{{$module->data['form_email']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-4 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_nothing"
                                        label="Ninguno"
                                        type="text"
                                        
                                        value="{{$module->data['form_nothing']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-4 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_menu1"
                                        label="Menu 1"
                                        type="text"
                                        
                                        value="{{$module->data['form_menu1']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-4">
                                    <x-form.input
                                        name="form_menu2"
                                        label="Menu 2"
                                        type="text"
                                        
                                        value="{{$module->data['form_menu2']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-xl-4 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_menu3"
                                        label="Menu 3"
                                        type="text"
                                        
                                        value="{{$module->data['form_menu3']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-4 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_menu4"
                                        label="Menu 4"
                                        type="text"
                                        
                                        value="{{$module->data['form_menu4']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-4">
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
                                <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_option1"
                                        label="Opción 1"
                                        type="text"
                                        
                                        value="{{$module->data['form_option1']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-6">
                                    <x-form.input
                                        name="form_option2"
                                        label="Opción 2"
                                        type="text"
                                        
                                        value="{{$module->data['form_option2']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                    <x-form.input
                                        name="form_option3"
                                        label="Opción 3"
                                        type="text"
                                        value="{{$module->data['form_option3']}}"
                                    />
                                </div>
                                <div class="col-12 col-xl-6">
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
</div>
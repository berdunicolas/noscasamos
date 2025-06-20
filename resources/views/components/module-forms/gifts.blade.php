<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Regalos</h4>

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
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['text']}}</textarea>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.upload-zone label="Imagen de fondo" :zoneOwner="$module->name" zoneName="gift_background_image" :isMultiple=false>
                    @if($module->data['background_image'])
                        <div class="preview-item">
                            <img src="{{$module->data['background_image']}}" alt="preview">
                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'gift_background_image')">×</button>
                        </div>
                    @endif
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( [$module->name => ['gift_background_image' => $module->data['background_image']]])
                </p>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.upload-zone label="Imagen de módulo" :zoneOwner="$module->name" zoneName="gift_module_image" :isMultiple=false>
                        @if($module->data['module_image'])
                            <div class="preview-item">
                                <img src="{{$module->data['module_image']}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'gift_module_image')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( [$module->name => ['gift_module_image' => $module->data['module_image']]])
                    </p>
                </div>
            </div>
        </div>
        {{--<div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="button_icon"
                    label="Icono botón"
                    type="text"
                    
                    value="{{$module->data['button_icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="button_text"
                        label="Texto botón"
                        type="text"
                        
                        value="{{$module->data['button_text']}}"
                    />
                </div>
            </div>
        </div>--}}
        <div class="mb-3">
            <div class="mb-3">
                <x-form.input
                    name="button_text"
                    label="Texto botón"
                    type="text"
                    
                    value="{{$module->data['button_text']}}"
                />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.select
                    name="button_type"
                    label="Tipo de botón"
                >
                    <x-form.select-option
                        value="Modal"
                        label="Modal"
                        selected="{{ ($module->data['button_type'] ==  'Modal') ? true : false }}"
                    />
                    <x-form.select-option
                        value="Link"
                        label="Link"
                        selected="{{ ($module->data['button_type'] ==  'Link') ? true : false }}"
                    />
                </x-form.select>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input-group label="Url botón" >
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="button_url"
                            value="{{ $module->data['button_url'] }}"               
                        />
                    </x-form.input-group>
                </div>
            </div>
        </div>

        <div class="accordion accordion-flush">
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Cuenta 1</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-first-account-form', 'first_account_active')" type="checkbox" role="switch" {{$module->data['first_account']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="first_account_active" id="first_account_active" value="{{$module->data['first_account']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-first-account-form" class="accordion-collapse collapse {{$module->data['first_account']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="first_account_tittle"
                                label="Título"
                                type="text"
                                
                                value="{{$module->data['first_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="first_account_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['first_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_data"
                                    label="Dato principal"
                                    type="text"
                                    
                                    value="{{$module->data['first_account']['data']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_value"
                                    label="Valor de dato principal"
                                    type="text"
                                    
                                    value="{{$module->data['first_account']['value']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_copy_button_text"
                                    label="Texto boton de copiar"
                                    type="text"
                                    
                                    value="{{$module->data['first_account']['copy_button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_copy_message"
                                    label="Mensaje de copiado"
                                    type="text"
                                    
                                    value="{{$module->data['first_account']['copy_message']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="switchCheckChecked">Cuenta 2</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-second-account-form', 'second_account_active')" type="checkbox" role="switch" {{$module->data['second_account']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="second_account_active" id="second_account_active" value="{{$module->data['second_account']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-second-account-form" class="accordion-collapse collapse {{$module->data['second_account']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="second_account_tittle"
                                label="Título"
                                type="text"
                                
                                value="{{$module->data['second_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="second_account_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['second_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input-group label="Url botón" >
                                    <span class="input-group-text">https://</span>
                                    <x-form.input
                                        name="second_account_button_url"
                                        value="{{ $module->data['second_account']['button_url'] }}"               
                                    />
                                </x-form.input-group>
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="second_account_button_text"
                                    label="Texto botón"
                                    type="text"
                                    
                                    value="{{$module->data['second_account']['button_text']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="switchCheckChecked">Buzón</label>
                        <input class="form-check-input" type="checkbox" onchange="showCollapseSwitch(this, 'collapse-box-form', 'box_active')" role="switch" {{$module->data['box']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="box_active" id="box_active" value="{{$module->data['box']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-box-form" class="accordion-collapse collapse {{$module->data['box']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="box_tittle"
                                label="Título"
                                type="text"
                                
                                value="{{$module->data['box']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="box_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['box']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="box_button_text"
                                    label="Texto boton"
                                    type="text"
                                    
                                    value="{{$module->data['box']['button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input-group label="Url botón" >
                                    <span class="input-group-text">https://</span>
                                    <x-form.input
                                        name="box_button_url"
                                        value="{{ $module->data['box']['button_url'] }}"               
                                    />
                                </x-form.input-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="switchCheckChecked">Lista</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-list-form', 'list_active')" type="checkbox" role="switch" {{$module->data['list']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="list_active" id="list_active" value="{{$module->data['list']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-list-form" class="accordion-collapse collapse {{$module->data['list']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="list_tittle"
                                label="Título"
                                type="text"
                                
                                value="{{$module->data['list']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="list_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['list']['text']}}</textarea>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 1</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_1"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_1']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_1"
                                            value="{{ $module->data['list']['product_url_1'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_1"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_1']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_1" :isMultiple=false>
                                    @if($module->data['list']['product_image_1'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_1']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_1')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_1' => $module->data['list']['product_image_1']]])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 2</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_2"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_2']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_2"
                                            value="{{ $module->data['list']['product_url_2'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_2"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_2']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_2" :isMultiple=false>
                                    @if($module->data['list']['product_image_2'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_2']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_2')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_2' => $module->data['list']['product_image_2']]])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 3</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_3"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_3']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_3"
                                            value="{{ $module->data['list']['product_url_3'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_3"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_3']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_3" :isMultiple=false>
                                    @if($module->data['list']['product_image_3'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_3']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_3')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_3' => $module->data['list']['product_image_3']]])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 4</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_4"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_4']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_4"
                                            value="{{ $module->data['list']['product_url_4'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_4"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_4']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_4" :isMultiple=false>
                                    @if($module->data['list']['product_image_4'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_4']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_4')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_4' => $module->data['list']['product_image_4']]])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 5</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_5"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_5']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_5"
                                            value="{{ $module->data['list']['product_url_5'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_5"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_5']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_5" :isMultiple=false>
                                    @if($module->data['list']['product_image_5'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_5']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_5')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_5' => $module->data['list']['product_image_5']]])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-5 mb-4">Producto 6</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_6"
                                        label="Producto"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_6']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input-group label="Link de producto" >
                                        <span class="input-group-text">https://</span>
                                        <x-form.input
                                            name="list_product_url_6"
                                            value="{{ $module->data['list']['product_url_6'] }}"               
                                        />
                                    </x-form.input-group>
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_6"
                                        label="Precio"
                                        type="text"
                                        
                                        value="{{$module->data['list']['product_price_6']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" :zoneOwner="$module->name" zoneName="list_product_image_6" :isMultiple=false>
                                    @if($module->data['list']['product_image_6'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_6']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_6')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( [$module->name => ['list_product_image_6' => $module->data['list']['product_image_6']]])
                                </p>
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
<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Regalos</h4>

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
                        placeholder="Regalos"
                        value="{{$module->data['pre_tittle']}}"
                    />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['text']}}</textarea>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.upload-zone label="Imagen de fondo" zoneName="gift_background_image" :isMultiple=false>
                    @if($module->data['background_image'])
                        <div class="preview-item">
                            <img src="{{$module->data['background_image']}}" alt="preview">
                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'gift_background_image')">×</button>
                        </div>
                    @endif
                </x-form.upload-zone>
                <p class="selectedFilesUpdater" hidden>
                    @json( ['gift_background_image', $module->data['background_image']])
                </p>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.upload-zone label="Imagen de módulo" zoneName="gift_module_image" :isMultiple=false>
                        @if($module->data['module_image'])
                            <div class="preview-item">
                                <img src="{{$module->data['module_image']}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'gift_module_image')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( ['gift_module_image', $module->data['module_image']])
                    </p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="button_icon"
                    label="Icono botón"
                    type="text"
                    placeholder="fa-gift"
                    value="{{$module->data['button_icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="button_text"
                        label="Texto botón"
                        type="text"
                        placeholder="Mas información"
                        value="{{$module->data['button_text']}}"
                    />
                </div>
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
                    <x-form.input
                        name="button_url"
                        label="Url botón"
                        type="text"
                        placeholder="https://www.google.com"
                        value="{{$module->data['button_url']}}"
                    />
                </div>
            </div>
        </div>

        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Cuenta 1</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'first_account_active')" type="checkbox" role="switch" {{$module->data['first_account']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="first_account_active" id="first_account_active" value="{{$module->data['first_account']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="first_account_tittle"
                                label="Título"
                                type="text"
                                placeholder="Cuenta en pesos"
                                value="{{$module->data['first_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="first_account_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['first_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_data"
                                    label="Dato principal"
                                    type="text"
                                    placeholder="CBU"
                                    value="{{$module->data['first_account']['data']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_value"
                                    label="Valor de dato principal"
                                    type="text"
                                    placeholder="Copiar"
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
                                    placeholder="CBU"
                                    value="{{$module->data['first_account']['copy_button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_copy_message"
                                    label="Mensaje de copiado"
                                    type="text"
                                    placeholder="Copiado"
                                    value="{{$module->data['first_account']['copy_message']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <label class="form-check-label" for="switchCheckChecked">Cuenta 2</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'second_account_active')" type="checkbox" role="switch" {{$module->data['second_account']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="second_account_active" id="second_account_active" value="{{$module->data['second_account']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="second_account_tittle"
                                label="Título"
                                type="text"
                                placeholder="Cuenta en pesos"
                                value="{{$module->data['second_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="second_account_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['second_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="second_account_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://example-pos.com"
                                    value="{{$module->data['second_account']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="second_account_button_text"
                                    label="Texto botón"
                                    type="text"
                                    placeholder="Ir a punto de pago"
                                    value="{{$module->data['second_account']['button_text']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-check-label" for="switchCheckChecked">Buzón</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'box_active')" role="switch" {{$module->data['box']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="box_active" id="box_active" value="{{$module->data['box']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="box_tittle"
                                label="Título"
                                type="text"
                                placeholder="Cuenta en pesos"
                                value="{{$module->data['box']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="box_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['box']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="box_button_text"
                                    label="Texto boton"
                                    type="text"
                                    placeholder="Más información"
                                    value="{{$module->data['box']['button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="box_button_url"
                                    label="Url boton"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module->data['box']['button_url']}}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Lista</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'list_active')" type="checkbox" role="switch" {{$module->data['list']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="list_active" id="list_active" value="{{$module->data['list']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <x-form.input
                                name="list_tittle"
                                label="Título"
                                type="text"
                                placeholder="Cuenta en pesos"
                                value="{{$module->data['list']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="list_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['list']['text']}}</textarea>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 1</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_1"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_1']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_1"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_1']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_1"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_1']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_1" :isMultiple=false>
                                    @if($module->data['list']['product_image_1'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_1']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_1')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_1', $module->data['list']['product_image_1']])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 2</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_2"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_2']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_2"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_2']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_2"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_2']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_2" :isMultiple=false>
                                    @if($module->data['list']['product_image_2'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_2']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_2')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_2', $module->data['list']['product_image_2']])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 3</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_3"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_3']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_3"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_3']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_3"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_3']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_3" :isMultiple=false>
                                    @if($module->data['list']['product_image_3'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_3']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_3')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_3', $module->data['list']['product_image_3']])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 4</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_4"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_4']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_4"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_4']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_4"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_4']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_4" :isMultiple=false>
                                    @if($module->data['list']['product_image_4'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_4']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_4')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_4', $module->data['list']['product_image_4']])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 5</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_5"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_5']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_5"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_5']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_5"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_5']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_5" :isMultiple=false>
                                    @if($module->data['list']['product_image_5'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_5']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_5')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_5', $module->data['list']['product_image_5']])
                                </p>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 6</h5>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_6"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module->data['list']['product_6']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_url_6"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module->data['list']['product_url_6']}}"
                                    />
                                </div>
                                <div class="col-4">
                                    <x-form.input
                                        name="list_product_price_6"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module->data['list']['product_price_6']}}"
                                    />
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-form.upload-zone label="Imagen" zoneName="list_product_image_6" :isMultiple=false>
                                    @if($module->data['list']['product_image_6'])
                                        <div class="preview-item">
                                            <img src="{{$module->data['list']['product_image_6']}}" alt="preview">
                                            <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'list_product_image_6')">×</button>
                                        </div>
                                    @endif
                                </x-form.upload-zone>
                                <p class="selectedFilesUpdater" hidden>
                                    @json( ['list_product_image_6', $module->data['list']['product_image_6']])
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
<div id="{{$id}}" class="module-form visually-hidden">
    <h4>Regalos</h4>

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
                        placeholder="Regalos"
                        value="{{$module['pre_tittle']}}"
                    />
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
            <textarea name="text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['text']}}</textarea>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <x-form.input
                    name="background_image"
                    label="Imagen de fondo"
                    type="file"
                    value="{{$module['background_image']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="module_image"
                        label="Imagen de módulo"
                        type="file"
                        value="{{$module['module_image']}}"
                    />
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
                    value="{{$module['button_icon']}}"
                />
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <x-form.input
                        name="button_text"
                        label="Texto botón"
                        type="text"
                        placeholder="Mas información"
                        value="{{$module['button_text']}}"
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
                        selected="{{ ($module['button_type'] ==  'Modal') ? true : false }}"
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
                        value="{{$module['button_url']}}"
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
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'first_account_active')" type="checkbox" role="switch" {{$module['first_account']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="first_account_active" id="first_account_active" value="{{$module['first_account']['active'] ? 1 : 0}}">
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
                                value="{{$module['first_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="first_account_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['first_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_data"
                                    label="Dato principal"
                                    type="text"
                                    placeholder="CBU"
                                    value="{{$module['first_account']['data']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="first_account_value"
                                    label="Valor de dato principal"
                                    type="text"
                                    placeholder="0000000000000000000000"
                                    value="{{$module['first_account']['value']}}"
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
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'second_account_active')" type="checkbox" role="switch" {{$module['second_account']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="second_account_active" id="second_account_active" value="{{$module['second_account']['active'] ? 1 : 0}}">
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
                                value="{{$module['second_account']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="second_account_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['second_account']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="second_account_button_url"
                                    label="Url botón"
                                    type="text"
                                    placeholder="https://example-pos.com"
                                    value="{{$module['second_account']['button_url']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="second_account_button_text"
                                    label="Texto botón"
                                    type="text"
                                    placeholder="Ir a punto de pago"
                                    value="{{$module['second_account']['button_text']}}"
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
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'box_active')" role="switch" {{$module['box']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="box_active" id="box_active" value="{{$module['box']['active'] ? 1 : 0}}">
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
                                value="{{$module['box']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="box_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['box']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="box_button_text"
                                    label="Texto boton"
                                    type="text"
                                    placeholder="Más información"
                                    value="{{$module['box']['button_text']}}"
                                />
                            </div>
                            <div class="col-6">
                                <x-form.input
                                    name="box_button_url"
                                    label="Url boton"
                                    type="text"
                                    placeholder="https://www.google.com"
                                    value="{{$module['box']['button_url']}}"
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
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'list_active')" type="checkbox" role="switch" {{$module['list']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="list_active" id="list_active" value="{{$module['list']['active'] ? 1 : 0}}">
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
                                value="{{$module['list']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="list_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module['list']['text']}}</textarea>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 1</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_1"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_1']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_1"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_1']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_1"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_1']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_1"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_1']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 2</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_2"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_2']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_2"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_2']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_2"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_2']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_2"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_2']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 3</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_3"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_3']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_3"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_3']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_3"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_3']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_3"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_3']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 4</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_4"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_4']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_4"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_4']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_4"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_4']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_4"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_4']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 5</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_5"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_5']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_5"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_5']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_5"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_5']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_5"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_5']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="mt-4">Producto 6</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_6"
                                        label="Producto"
                                        type="text"
                                        placeholder="Articulos de hogar"
                                        value="{{$module['list']['product_6']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_url_6"
                                        label="Link de producto"
                                        type="text"
                                        placeholder="https://www.google.com"
                                        value="{{$module['list']['product_url_6']}}"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_price_6"
                                        label="Precio"
                                        type="text"
                                        placeholder="$30.000 ARS"
                                        value="{{$module['list']['product_price_6']}}"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-form.input
                                        name="list_product_image_6"
                                        label="Imagen"
                                        type="file"
                                        value="{{$module['list']['product_image_6']}}"
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
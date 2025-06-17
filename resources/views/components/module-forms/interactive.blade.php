<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Interactivos</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label class="form-check-label" for="switchCheckChecked">Spotify</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'spotify_active')" type="checkbox" role="switch" {{$module->data['spotify']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="spotify_active" id="spotify_active" value="{{$module->data['spotify']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="spotify_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module->data['spotify']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="spotify_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module->data['spotify']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="spotify_tittle"
                                label="Título"
                                type="text"
                                placeholder="Titulo"
                                value="{{$module->data['spotify']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="spotify_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['spotify']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="spotify_button_icon"
                                    label="Icono botón"
                                    type="text"
                                    placeholder="fa-square-arrow-up-right"
                                    value="{{$module->data['spotify']['button_icon']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="spotify_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module->data['spotify']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="spotify_button_url"
                                label="Url botton"
                                type="text"
                                placeholder="https://www.google.com"
                                value="{{$module->data['spotify']['button_url']}}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <label class="form-check-label" for="switchCheckChecked">Hashtag</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'hashtag_active')" type="checkbox" role="switch" {{$module->data['hashtag']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="hashtag_active" id="hashtag_active" value="{{$module->data['hashtag']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="hashtag_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module->data['hashtag']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="hashtag_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module->data['hashtag']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="hashtag_tittle"
                                label="Título"
                                type="text"
                                placeholder="Titulo"
                                value="{{$module->data['hashtag']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="hashtag_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['hashtag']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="hashtag_button_icon"
                                    label="Icono botón"
                                    type="text"
                                    placeholder="fa-square-arrow-up-right"
                                    value="{{$module->data['hashtag']['button_icon']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="hashtag_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module->data['hashtag']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="hashtag_button_url"
                                label="Url botton"
                                type="text"
                                placeholder="https://www.google.com"
                                value="{{$module->data['hashtag']['button_url']}}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <label class="form-check-label" for="switchCheckChecked">Instagram</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" onchange="checkboxSwitch(this, 'ig_active')" role="switch" {{$module->data['ig']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="ig_active" id="ig_active" value="{{$module->data['ig']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="ig_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module->data['ig']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="ig_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module->data['ig']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ig_tittle"
                                label="Título"
                                type="text"
                                placeholder="Titulo"
                                value="{{$module->data['ig']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="ig_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['ig']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="ig_button_icon"
                                    label="Icono botón"
                                    type="text"
                                    placeholder="fa-square-arrow-up-right"
                                    value="{{$module->data['ig']['button_icon']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="ig_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module->data['ig']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ig_button_url"
                                label="Url botton"
                                type="text"
                                placeholder="https://www.google.com"
                                value="{{$module->data['ig']['button_url']}}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <label class="form-check-label" for="switchCheckChecked">Link</label>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" onchange="checkboxSwitch(this, 'link_active')" type="checkbox" role="switch" {{$module->data['link']['active'] ? 'checked' : ''}}>
                            <input type="text" hidden name="link_active" id="link_active" value="{{$module->data['link']['active'] ? 1 : 0}}">
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="link_icon"
                                    label="Icono"
                                    type="text"
                                    placeholder="fa-rings-wedding"
                                    value="{{$module->data['link']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="link_order"
                                    label="Orden"
                                    type="text"
                                    placeholder="1"
                                    value="{{$module->data['link']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="link_tittle"
                                label="Título"
                                type="text"
                                placeholder="Titulo"
                                value="{{$module->data['link']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="link_text" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit... " class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['link']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-form.input
                                    name="link_button_icon"
                                    label="Icono botón"
                                    type="text"
                                    placeholder="fa-square-arrow-up-right"
                                    value="{{$module->data['link']['button_icon']}}"
                                />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="link_button_text"
                                        label="Texto botón"
                                        type="text"
                                        placeholder="Ver más"
                                        value="{{$module->data['link']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="link_button_url"
                                label="Url botton"
                                type="text"
                                placeholder="https://www.google.com"
                                value="{{$module->data['link']['button_url']}}"
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
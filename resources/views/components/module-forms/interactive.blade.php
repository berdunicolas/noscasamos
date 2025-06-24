<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Interactivos</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="accordion accordion-flush">
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Spotify</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-spotify-form', 'spotify_active')" type="checkbox" role="switch" {{$module->data['spotify']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="spotify_active" id="spotify_active" value="{{$module->data['spotify']['active'] ? 1 : 0}}">
                    </div>
                
                </div>
                <div id="collapse-spotify-form" class="accordion-collapse collapse {{$module->data['spotify']['active'] ? 'show' : ''}}">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="spotify_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$module->data['spotify']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="spotify_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$module->data['spotify']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="spotify_tittle"
                                label="Título"
                                type="text"
                                value="{{$module->data['spotify']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="spotify_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['spotify']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="spotify_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$module->data['spotify']['button_text']}}"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <x-form.input-group label="Url botton">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                    <x-form.input
                                        name="spotify_button_url"
                                        type="text"
                                        value="{{$module->data['spotify']['button_url']}}"
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
                        <label class="form-check-label">Hashtag</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-hashtag-form', 'hashtag_active')" type="checkbox" role="switch" {{$module->data['hashtag']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="hashtag_active" id="hashtag_active" value="{{$module->data['hashtag']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-hashtag-form" class="accordion-collapse collapse {{$module->data['hashtag']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="hashtag_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$module->data['hashtag']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="hashtag_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$module->data['hashtag']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="hashtag_tittle"
                                label="Título"
                                type="text"
                                value="{{$module->data['hashtag']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="hashtag_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['hashtag']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="hashtag_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$module->data['hashtag']['button_text']}}"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <x-form.input-group label="Url botton">
                                    <span class="input-group-text">https://</span>
                                    <x-form.input
                                        name="hashtag_button_url"
                                        type="text"
                                        value="{{$module->data['hashtag']['button_url']}}"
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
                        <label class="form-check-label">Instagram</label>
                        <input class="form-check-input" type="checkbox" onchange="showCollapseSwitch(this, 'collapse-instagram-form', 'ig_active')" role="switch" {{$module->data['ig']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="ig_active" id="ig_active" value="{{$module->data['ig']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-instagram-form" class="accordion-collapse collapse {{$module->data['ig']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="ig_icon"
                                    label="Icono"
                                    type="text"
                                    
                                    value="{{$module->data['ig']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="ig_order"
                                    label="Orden"
                                    type="text"
                                    
                                    value="{{$module->data['ig']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ig_tittle"
                                label="Título"
                                type="text"
                                
                                value="{{$module->data['ig']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="ig_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['ig']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="ig_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$module->data['ig']['button_text']}}"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <x-form.input-group label="Url botton">
                                    <span class="input-group-text">https://</span>
                                    <x-form.input
                                        name="ig_button_url"
                                        type="text"
                                        value="{{$module->data['ig']['button_url']}}"
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
                        <label class="form-check-label">Link</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-link-form', 'link_active')" type="checkbox" role="switch" {{$module->data['link']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="link_active" id="link_active" value="{{$module->data['link']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-link-form" class="accordion-collapse collapse {{$module->data['link']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-9">
                                <x-form.input
                                    name="link_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$module->data['link']['icon']}}"
                                />
                            </div>
                            <div class="col-3">
                                <x-form.input
                                    name="link_order"
                                    label="Orden"
                                    type="text"
                                    
                                    value="{{$module->data['link']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="link_tittle"
                                label="Título"
                                type="text"

                                value="{{$module->data['link']['tittle']}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                            <textarea name="link_text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$module->data['link']['text']}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="link_button_text"
                                        label="Texto botón"
                                        type="text"
                                        
                                        value="{{$module->data['link']['button_text']}}"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <x-form.input-group label="Url botton">
                                    <span class="input-group-text">https://</span>
                                    <x-form.input
                                        name="link_button_url"
                                        type="text"
                                        value="{{$module->data['link']['button_url']}}"
                                    />
                                </x-form.input-group>
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
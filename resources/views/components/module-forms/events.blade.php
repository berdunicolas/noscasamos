<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Eventos</h4>
    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :action="$action">
        <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Civíl</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-civil-form', 'civil_active')" type="checkbox" role="switch" {{$events['civil']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="civil_active" id="civil_active" value="{{$events['civil']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-civil-form" class="accordion-collapse collapse {{$events['civil']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-12 col-xl-5 mb-3 mb-xl-0">
                                <x-form.input
                                    name="civil_event"
                                    label="Evento"
                                    type="text"
                                    value="{{$events['civil']['event']}}"
                                />
                            </div>
                            <div class="col-8 col-xl-5">
                                <x-form.input
                                    name="civil_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$events['civil']['icon']}}"
                                />
                            </div>
                            <div class="col-4 col-xl-2">
                                <x-form.input
                                    name="civil_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$events['civil']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="civil_date"
                                    label="Fecha"
                                    type="text"
                                    value="{{$events['civil']['date']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="civil_month"
                                    label="Mes"
                                    type="text"
                                    value="{{$events['civil']['month']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="civil_time"
                                    label="Hora"
                                    type="text"
                                    value="{{$events['civil']['time']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form.input
                                    name="civil_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    value="{{$events['civil']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="civil_name"
                                label="Nombre"
                                type="text"
                                value="{!!$events['civil']['name']!!}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="civil_detail"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$events['civil']['detail']!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onchange="checkboxSwitch(this, 'civil_use_image')" type="checkbox" role="switch" {{$events['civil']['use_image'] ? 'checked' : ''}}>
                                <input type="text" hidden name="civil_use_image" id="civil_use_image" value="{{$events['civil']['use_image'] ? 1 : 0}}">
                                <label class="form-check-label" for="">Usar imagen</label>
                            </div>
                            @if ($isInvitation)
                            <x-form.upload-zone :zoneOwner="$module->name" zoneName="civil_image" :isMultiple=false>
                                @if($events['civil']['image'])
                                    <div class="preview-item">
                                        <img src="{{$events['civil']['image']}}" alt="preview">
                                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'civil_image')">×</button>
                                    </div>
                                @endif
                            
                            </x-form.upload-zone>
                            <p class="selectedFilesUpdater" hidden>
                                @json( [$module->name => ['civil_image' => $events['civil']['image']]])
                            </p>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                <x-form.input
                                    label="Url botón"
                                    name="civil_button_url"
                                    type="text"
                                    value="{{$events['civil']['button_url']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="civil_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$events['civil']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Ceremonia</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-ceremony-form', 'ceremony_active')" type="checkbox" role="switch" {{$events['ceremony']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="ceremony_active" id="ceremony_active" value="{{$events['ceremony']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-ceremony-form" class="accordion-collapse collapse {{$events['ceremony']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-12 col-xl-5 mb-3 mb-xl-0">
                                <x-form.input
                                    name="ceremony_event"
                                    label="Evento"
                                    type="text"
                                    value="{{$events['ceremony']['event']}}"
                                />
                            </div>
                            <div class="col-8 col-xl-5">
                                <x-form.input
                                    name="ceremony_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$events['ceremony']['icon']}}"
                                />
                            </div>
                            <div class="col-4 col-xl-2">
                                <x-form.input
                                    name="ceremony_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$events['ceremony']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="ceremony_date"
                                    label="Fecha"
                                    type="text"
                                    value="{{$events['ceremony']['date']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="ceremony_month"
                                    label="Mes"
                                    type="text"
                                    value="{{$events['ceremony']['month']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="ceremony_time"
                                    label="Hora"
                                    type="text"
                                    value="{{$events['ceremony']['time']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form.input
                                    name="ceremony_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    value="{{$events['ceremony']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="ceremony_name"
                                label="Nombre"
                                type="text"
                                value="{!!$events['ceremony']['name']!!}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="ceremony_detail"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$events['ceremony']['detail']!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onchange="checkboxSwitch(this, 'ceremony_use_image')" type="checkbox" role="switch" {{$events['ceremony']['use_image'] ? 'checked' : ''}}>
                                <input type="text" hidden name="ceremony_use_image" id="ceremony_use_image" value="{{$events['ceremony']['use_image'] ? 1 : 0}}">
                                <label class="form-check-label" for="">Usar imagen</label>
                            </div>
                            @if($isInvitation)
                            <x-form.upload-zone :zoneOwner="$module->name" zoneName="ceremony_image" :isMultiple=false>
                                @if($events['ceremony']['image'])
                                    <div class="preview-item">
                                        <img src="{{$events['ceremony']['image']}}" alt="preview">
                                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'ceremony_image')">×</button>
                                    </div>
                                @endif
                            
                            </x-form.upload-zone>
                            <p class="selectedFilesUpdater" hidden>
                                @json( [$module->name => ['ceremony_image' => $events['ceremony']['image']]])
                            </p>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                <x-form.input
                                    label="Url botón"
                                    name="ceremony_button_url"
                                    type="text"
                                    value="{{$events['ceremony']['button_url']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="ceremony_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$events['ceremony']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Festejo</label>
                        <input class="form-check-input" type="checkbox" onchange="showCollapseSwitch(this, 'collapse-party-form', 'party_active')" role="switch" {{$events['party']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="party_active" id="party_active" value="{{$events['party']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-party-form" class="accordion-collapse collapse {{$events['party']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-12 col-xl-5 mb-3 mb-xl-0">
                                <x-form.input
                                    name="party_event"
                                    label="Evento"
                                    type="text"
                                    value="{{$events['party']['event']}}"
                                />
                            </div>
                            <div class="col-8 col-xl-5">
                                <x-form.input
                                    name="party_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$events['party']['icon']}}"
                                />
                            </div>
                            <div class="col-4 col-xl-2">
                                <x-form.input
                                    name="party_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$events['party']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="party_date"
                                    label="Fecha"
                                    type="text"
                                    value="{{$events['party']['date']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="party_month"
                                    label="Mes"
                                    type="text"
                                    value="{{$events['party']['month']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3 mb-3 mb-xl-0">
                                <x-form.input
                                    name="party_time"
                                    label="Hora"
                                    type="text"
                                    value="{{$events['party']['time']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-3">
                                <x-form.input
                                    name="party_hr_translation"
                                    label="Hs texto"
                                    type="text"
                                    value="{{$events['party']['hr_translation']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="party_name"
                                label="Nombre"
                                type="text"
                                value="{!!$events['party']['name']!!}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="party_detail"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$events['party']['detail']!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onchange="checkboxSwitch(this, 'party_use_image')" type="checkbox" role="switch" {{$events['party']['use_image'] ? 'checked' : ''}}>
                                <input type="text" hidden name="party_use_image" id="party_use_image" value="{{$events['party']['use_image'] ? 1 : 0}}">
                                <label class="form-check-label" for="">Usar imagen</label>
                            </div>
                            @if ($isInvitation)    
                            <x-form.upload-zone :zoneOwner="$module->name" zoneName="party_image" :isMultiple=false>
                                @if($events['party']['image'])
                                    <div class="preview-item">
                                        <img src="{{$events['party']['image']}}" alt="preview">
                                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'party_image')">×</button>
                                    </div>
                                @endif
                            
                            </x-form.upload-zone>
                            <p class="selectedFilesUpdater" hidden>
                                @json( [$module->name => ['party_image' => $events['party']['image']]])
                            </p>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                <x-form.input
                                    label="Url botón"
                                    name="party_button_url"
                                    type="text"
                                    value="{{$events['party']['button_url']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="party_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$events['party']['button_text']}}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header py-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Dresscode</label>
                        <input class="form-check-input" onchange="showCollapseSwitch(this, 'collapse-dresscode-form', 'dresscode_active')" type="checkbox" role="switch" {{$events['dresscode']['active'] ? 'checked' : ''}}>
                        <input type="text" hidden name="dresscode_active" id="dresscode_active" value="{{$events['dresscode']['active'] ? 1 : 0}}">
                    </div>
                </div>
                <div id="collapse-dresscode-form" class="accordion-collapse collapse {{$events['dresscode']['active'] ? 'show' : ''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-12 col-xl-5 mb-3 mb-xl-0">
                                <x-form.input
                                    name="dresscode_event"
                                    label="Evento"
                                    type="text"
                                    value="{{$events['dresscode']['event']}}"
                                />
                            </div>
                            <div class="col-8 col-xl-5">
                                <x-form.input
                                    name="dresscode_icon"
                                    label="Icono"
                                    type="text"
                                    value="{{$events['dresscode']['icon']}}"
                                />
                            </div>
                            <div class="col-4 col-xl-2">
                                <x-form.input
                                    name="dresscode_order"
                                    label="Orden"
                                    type="text"
                                    value="{{$events['dresscode']['order']}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-form.input
                                name="dresscode_name"
                                label="Nombre"
                                type="text"
                                value="{!!$events['dresscode']['name']!!}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                            <textarea name="dresscode_detail"  class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$events['dresscode']['detail']!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onchange="checkboxSwitch(this, 'dresscode_use_image')" type="checkbox" role="switch" {{$events['dresscode']['use_image'] ? 'checked' : ''}}>
                                <input type="text" hidden name="dresscode_use_image" id="dresscode_use_image" value="{{$events['dresscode']['use_image'] ? 1 : 0}}">
                                <label class="form-check-label" for="">Usar imagen</label>
                            </div>
                            @if ($isInvitation)                                
                            <x-form.upload-zone :zoneOwner="$module->name" zoneName="dresscode_image" :isMultiple=false>
                                @if($events['dresscode']['image'])
                                    <div class="preview-item">
                                        <img src="{{$events['dresscode']['image']}}" alt="preview">
                                        <button type="button" class="remove-btn" onclick="eliminarImagen(this, '{{$module->name}}', 'dresscode_image')">×</button>
                                    </div>
                                @endif
                            
                            </x-form.upload-zone>
                            <p class="selectedFilesUpdater" hidden>
                                @json( [$module->name => ['dresscode_image' => $events['dresscode']['image']]])
                            </p>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-xl-6 mb-3 mb-xl-0">
                                <x-form.input
                                    label="Url botón"
                                    name="dresscode_button_url"
                                    type="text"
                                    value="{{$events['dresscode']['button_url']}}"
                                />
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="mb-3">
                                    <x-form.input
                                        name="dresscode_button_text"
                                        label="Texto botón"
                                        type="text"
                                        value="{{$events['dresscode']['button_text']}}"
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
                    <i class="fa-light fa-floppy-disk me-2" id="save-icon-form"></i>  
                    <span class="spinner-border spinner-border-sm me-2 visually-hidden" aria-hidden="true" id="spinner-icon-form"></span> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
<x-admin.layout navBarSelected="invitations" dabatable="false" dataTableName="" jqueryUI="true" overflowHidden="true" pageTabTitle="Invitaciones"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('inspinia/plugins/jquery-ui/js/jquery-ui.min.js'),

        asset('js/invitation-editor.js'),
        asset('js/invitation-modules.js'),

        asset('js/upload-zone.js'),
    ]"
>
    <div aria-label="breadcrumb" style="height: 4vh">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('invitations.index')}}" class="link-dark">Invitaciones</a></li>
            <li class="breadcrumb-item active fw-bold text-black" aria-current="page">Editor</li>
        </ol>
    </div>

    @livewire('admin.invitations.editor.header', ['invitation' => $invitation, 'guests' => $guests])

    <div class="d-flex flex-lg-row flex-column overflow-hidden pb-5" style="height: 81vh;">
        <nav class="navbar-secondary mb-3 ms-sm-3 ms-0">
            <ul class="nav navbar-nav flex-row flex-lg-column font-size-2" id="editor-nav-tab">
                <li class="nav-item selected">
                    <a onclick="selectEditorForm(this)" id="configuration" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="personalization" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Estilo</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="modules" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Módulos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="logs" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Logs</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="w-100 overflow-hidden">
            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto" id="configuration-form">
                <form action="{{route('api.invitations.set-config', $invitation->id)}}" onsubmit="saveInvitationChanges(event, this)">
                    <h4 class="py-2">Configuración de evento</h4>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.input
                                id="config-form-input"
                                name="host_names"
                                label="Nombre de anfitriones"
                                type="text"
                                
                                value="{{$invitation->host_names}}"
                            />
                        </div>
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.input
                                id="config-form-input"
                                name="contact_name"
                                label="Nombre de contacto"
                                type="text"
                                
                                value="{{$invitation->contact_name}}"
                            />
                        </div>
                        <div class="col-12 col-sm-4 mb-sm-0">
                            <x-form.input
                                id="config-form-input"
                                name="contact_phone"
                                label="Telefono de contacto"
                                type="text"
                                
                                value="{{$invitation->contact_phone}}"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <x-form.select
                                id="country-select"
                                name="country"
                                label="País"
                                extraAttributes="onchange=loadCountryDivisions()"
                            >   
                                @if ($invitation->event->country_id !== null)
                                    @foreach ($countries as $country)
                                        <x-form.select-option
                                            value="{{$country->code}}"
                                            label="{{$country->name}}"
                                            selected="{{($invitation->event->country_id == $country->id) ? true : false}}"
                                        />
                                    @endforeach
                                @else
                                    <x-form.select-option
                                        value=""
                                        label="Selecciona un país"
                                        selected="true"
                                    />
                                    @foreach ($countries as $country)
                                        <x-form.select-option
                                            value="{{$country->code}}"
                                            label="{{$country->name}}"
                                        />
                                    @endforeach
                                @endif
                            </x-form.select>
                        </div>
                        <div class="col-6">
                            <x-form.select
                                id="country-division-select"
                                name="country_division"
                                label="Provincia"
                                disabled="{{($invitation->event->country_id === null) ? true : false}}"
                            >
                                @if ($invitation->event->country_id !== null)
                                    @foreach ($countryDivisions as $division)
                                        <x-form.select-option
                                            value="{{$division->id}}"
                                            label="{{$division->state_name}}"
                                            selected="{{($invitation->event->country_division_id == $division->id) ? true : false}}"
                                        />
                                    @endforeach
                                @endif
                            </x-form.select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <x-form.input-group label="Nombre" labelFor="path_name" :errors="(array) $errors->get('path_name')">
                            <span class="input-group-text" id="basic-addon3">https://evnt.ar/</span>
                            <x-form.input
                                id="config-form-input"
                                name="path_name"
                                
                                value="{{$invitation->path_name}}"
                                extraAttributes="oninput=checkPathName(this) data-original-pathname={{$invitation->path_name}}"
                            />
                        </x-form.input-group>
                    </div>
                    <div class="mb-3">
                        <x-form.input
                            id="config-form-input"
                            name="calendar_title"
                            label="Titulo de calendario"
                            type="text"
                            
                            value="{{$invitation->calendar_title}}"
                        />
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 col-sm-3 mb-3 mb-sm-0">
                            <x-form.select id="config-form-input" name="event" label="Tipo de evento">
                                @foreach ($eventTypes as $eventType)
                                    <x-form.select-option
                                        value="{{$eventType}}"
                                        label="{{$eventType}}"
                                        selected="{{($invitation->event->event->value == $eventType) ? true : false}}"
                                    />
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-3 mb-3 mb-sm-0">
                            <x-form.select id="config-form-input" name="plan" label="Plan">
                                @foreach ($planTypes as $planType)
                                    <x-form.select-option
                                        value="{{$planType}}"
                                        label="{{$planType}}"
                                        selected="{{($invitation->event->plan->value == $planType) ? true : false}}"
                                    />
                                    
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-3 mb-3">
                            <x-form.select id="config-form-input" name="active" label="Estado">
                                <x-form.select-option
                                    value="1"
                                    label="Activo"
                                    selected="{{($invitation->active) ? true : false}}"
                                />
                                <x-form.select-option
                                    value="0"
                                    label="No activo"
                                    selected="{{($invitation->active) ? false : true}}"
                                />
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-3 mb-3">
                            <x-form.select id="config-form-input" name="seller" label="Seller">
                                @foreach ($sellers as $seller)
                                    <x-form.select-option
                                        value="{{$seller->id}}"
                                        label="{{$seller->name}}"
                                        selected="{{($invitation->seller_id == $seller->id) ? true : false}}"
                                    />
                                    
                                @endforeach
                            </x-form.select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 col-sm-3 mb-3 mb-sm-0">
                            <x-form.input
                                id="config-form-input"
                                name="date"
                                label="Fecha"
                                type="date"
                                value="{{$invitation->date}}"
                                :errors="(array) $errors->get('date')"
                            />
                        </div>
                        <div class="col-6 col-sm-3 mb-3 mb-sm-0">
                            <x-form.input
                                id="config-form-input"
                                name="time"
                                label="Hora"
                                type="time"
                                value="{{$invitation->time}}"

                                :errors="(array) $errors->get('time')"
                            />
                        </div>
                        <div class="col-6 col-sm-3 mb-3">
                            <x-form.select id="config-form-input" name="time_zone" label="Zona horaria">
                                @foreach ($timezones as $timezone)
                                    <x-form.select-option
                                        value="{{$timezone->carbon_format}}"
                                        label="{{$timezone->timezone}}"
                                        selected="{{($invitation->time_zone == $timezone->carbon_format) ? true : false}}"
                                    />
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-3 mb-3">
                            <x-form.input
                                id="config-form-input"
                                name="duration"
                                label="Duración"
                                type="number"
                                value="{{$invitation->duration}}"

                                :errors="(array) $errors->get('duration')"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <x-form.input
                            id="config-form-input"
                            name="meta_title"
                            label="Meta titulo"
                            type="text"
                            value="{{$invitation->meta_title}}"

                            :errors="(array) $errors->get('meta_title')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.upload-zone label="Meta imagen" zoneOwner="invitation" zoneName="meta_img" :isMultiple=false>
                            @if($invitation->media('meta_img')->first())
                                <div class="preview-item">
                                    <img src="{{$invitation->media('meta_img')->first()?->getMediaUrl()}}" alt="preview">
                                    <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'invitation', 'meta_img')">×</button>
                                </div>
                            @endif
                        </x-form.upload-zone>
                    </div>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-config-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </form>
            </div>
            <div class="tab-form px-3 h-100 pb-5 overflow-auto visually-hidden" id="personalization-form">
                <form action="{{route('api.invitations.set-style', $invitation->id)}}" onsubmit="saveInvitationChanges(event, this)">
                    <h4 class="py-2">Estilo</h4>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.select
                                id="style-form-input"
                                name="style"
                                label="Estilo"
                            >
                                @foreach ($styleTypes as $styleType)
                                    <x-form.select-option
                                        value="{{$styleType}}"
                                        label="{{$styleType}}"
                                        selected="{{$invitation->style?->value == $styleType ? true : false}}"
                                    />  
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.color-picker
                                id="style-form-input"
                                name="color"
                                label="Color principal"
                                value="{{$invitation->color}}"
                            />
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.color-picker
                                id="style-form-input"
                                name="background_color"
                                label="Color de fondo"
                                value="{{$invitation->background_color}}"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.input
                                id="style-form-input"
                                name="padding"
                                label="Relleno"
                                
                                type="text"
                                value="{{$invitation->padding}}"
                            />
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.select
                                id="style-form-input"
                                name="font"
                                label="Tipo de letra"
                            >
                                @foreach ($fonts as $font)
                                    <x-form.select-option
                                        value="{{$font->font_name}}"
                                        label="{{$font->font_name}}"
                                        selected="{{$invitation->font == $font ? true : false}}"
                                    />  
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.select
                                id="style-form-input"
                                name="icon_type"
                                label="Tipo de icono"
                            >
                                <x-form.select-option
                                    value="Animado"
                                    label="Animado"
                                    selected="{{$invitation->icon_type == 'Animado' ? true : false}}"
                                />  
                                <x-form.select-option
                                    value="Estatico"
                                    label="Estatico"
                                    selected="{{$invitation->icon_type == 'Estatico' ? true : false}}"
                                />  
                            </x-form.select>
                        </div>
                    </div>
                    <x-form.upload-zone label="Marco" zoneOwner="invitation" zoneName="frame_image" :isMultiple=false>
                        @if($invitation->media('frame_img')->first())
                            <div class="preview-item">
                                <img src="{{$invitation->media('frame_img')->first()?->getMediaUrl()}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'invitation', 'frame_image')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </form>
            </div>
            <div class="tab-form px-3 h-100 overflow-auto visually-hidden d-flex flex-column flex-md-row nowrap" id="modules-form">
                @livewire('admin.invitations.editor.modules-list', ['moduleOwner' => $invitation, 'modules' => $modules])
                <div class="px-4 pb-5 w-100" style="{{(isMobile()) ? 'margin-bottom: 50px !important;' : ''}}" id="module-form">
                    
                </div>
            </div>
            <div class="tab-form px-3 visually-hidden" id="logs-form">
                <h4 class="py-2">Logs</h4>
                <div class="h-100 overflow-auto" style="height: 500px; max-height: 500px !important">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Acción</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha y hora</th>
                            </tr>
                        </thead>
                        @livewire('admin.invitations.editor.logs', ['invitation' => $invitation->id])
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="save-changes-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-light fa-triangle-exclamation me-2"></i>Cambios sin guardar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro de salir sin guardar los cambios?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="changeFormTab()" data-bs-dismiss="modal"><span class="mx-3">Salir</span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-module-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{route('api.invitation.add-module', ['invitation' => $invitation->id])}}" onsubmit="newModule(event, this)">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir modulo</h1>
                        <button type="button" id="close-new-module-modal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-form.select
                            id="module-select"
                            name="new_module"
                            label="Modulos disponibles"
                        >
                            @foreach ($availableModules as $available)
                                <x-form.select-option
                                    value="{{$available['type']}}"
                                    label="{{$available['display_name']}}"
                                />
                            @endforeach
                        </x-form.select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-dark"><span class="mx-1">Añadir</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.INVITATION_MODULES_URL = "{{ route('api.invitation.modules', $invitation->id) }}";
        window.COUNTRY_DIVISIONS = "{{ route('api.countries-divisions') }}";
        window.VALIDATE_INVITATION = "{{ route('api.validate-invitation') }}";
        window.ENABLE_GUEST_TOKEN = "{{ route('api.invitations.enable-guest-token', $invitation->id) }}";

        let selectedFiles = {
            invitation: {
                frame_image: null,
                meta_img: null
            }
        };
    </script>

</x-admin.layout>
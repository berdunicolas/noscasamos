<x-admin.layout navBarSelected="invitations" dabatable="false" dataTableName="" jqueryUI="true">
    <div class="container-fluid" >
        {{--
        <header class="d-flex flex-row align-items-center" style="height: 105px">
            <p style="font-size: 2em;">Editor</p>             
        </header>--}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('invitations.index')}}" class="link-dark">Invitaciones</a></li>
                <li class="breadcrumb-item active fw-bold text-black" aria-current="page">Editor</li>
            </ol>
        </nav>
        <header class="d-flex flex-row justify-items-between w-100" style="height: 105px">
            <div>
                <p style="font-size: 2em;" id="invitation-name" class="m-0">{{$invitation->event->name}}</p>      
                <span class="me-3"><i class="fa-light fa-hashtag"></i> {{$invitation->id}}</span>
                <span class="me-3"><i class="fa-light fa-calendar"></i> {{($invitation->date) ? $invitation->date : 'Sin Fecha' }}</span>
                
                <span class="me-1 badge text-bg-primary">{{$invitation->event->event}}</span>
                
                @switch($invitation->event->plan->value)
                    @case('Clásico')
                        <span class="me-1 badge text-bg-info">{{$invitation->event->plan}}</span>
                        @break
                    @case('Gold')
                        <span class="me-1 badge text-bg-warning">{{$invitation->event->plan}}</span>
                        @break
                    @case('Platino')
                        <span class="me-1 badge text-bg-secondary">{{$invitation->event->plan}}</span>
                        @break
                    @default
                @endswitch

                @if ($invitation->active)
                    <span class="me-1 badge text-bg-success">Activo</span>
                @else
                    <span class="me-1 badge text-bg-danger">No activo</span>
                @endif
{{--
                @if (now()->toDateString() >= $invitation->date->toDateString())
                    <span class="me-1 badge border border-warning text-warning">No activo</span>    
                    @endif
--}}
                @if ($invitation->date)
                    @if ($invitation->validity)
                        <span class="me-1 badge border text-bg-secondary">No vigente</span>
                    @else
                        <span class="me-1 badge border text-bg-info">Vigente</span>
                    @endif
                @endif
                <span class="me-1 badge border border-black text-black">{{$invitation->seller->name}}</span>    
{{--
                @if ($invitation->createdBy)
                    <span class="me-3 badge border border-warning text-warning">{{$inviation->createdBy}}</span>    
                @endif
--}}
                
    
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#linkModal"><span class="mx-3"><i class="fa-light fa-share me-2"></i>Compartir</span></button>
                <button class="btn btn-outline-dark"  data-bs-toggle="modal" data-bs-target="#invitadosModal"><span class="mx-3"><i class="fa-light fa-users me-2"></i>Invitados</span></button>
                <a class="btn btn-dark" href="{{route('invitation', ['invitation' => $invitation->path_name])}}" target="_blank"><span class="mx-3"><i class="fa-light fa-eye me-2"></i>Ver invitación</span></a>
            </div>
            <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="linkModalLabel">Compartir invitación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                        <input type="text" class="form-control" id="linkInput" value="{{route('invitation', ['invitation' => $invitation->path_name])}}" readonly>
                        <button class="btn btn-dark" type="button" onclick="copiarEnlace()">
                            <i class="fa-light fa-copy"></i>
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
                <script>
                    function copiarEnlace() {
                        const input = document.getElementById("linkInput");
                        input.select();
                        input.setSelectionRange(0, 99999); // Para móviles
                        document.execCommand("copy");
                    }
                </script>
            </div>

            <div class="modal fade" id="invitadosModal" tabindex="-1" aria-labelledby="invitadosModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <div>
                        <h5 class="modal-title" id="invitadosModalLabel">Invitados</h5>
                        <small class="text-muted">Código: {{$invitation->plain_token}}</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <table id="example" class="display table table-bordered table-hover w-100">
                        <thead>
                            <tr>
                            <th data-priority="1">Nombre</th>
                            <th>Asiste</th>
                            <th>Acompañante</th>
                            <th>Alimentación</th>
                            <th class="none">Email</th>
                            <th class="none">Teléfono</th>
                            <th class="none">Traslado</th>
                            <th class="none">Comentarios</th>
                            <th class="none">Fecha Confirmación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($con as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->asiste }}</td>
                                <td>{{ $item->nombre_a }}</td>
                                <td>{{ $item->alimento }}</td>
                                <td class='none'>{{ $item->mail }}</td>
                                <td class='none'>{{ $item->telefono }}</td>
                                <td class='none'>{{ $item->traslado }}</td>
                                <td class='none'>{{ $item->comentarios }}</td>
                                <td class='none'>{{ $item->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('invitation.guests', ['invitation' => $invitation->path_name]) }}" target="_blank" class="btn btn-dark"><span class="mx-3"><i class="fa-light fa-link me-2"></i> Ir a panel</span></a>
                    </div>
                    </div>
                </div>
            </div>


        </header>

        
    </div>
    <main class="d-flex flex-row">
        <nav class="navbar-secondary">
            <ul class="nav navbar-nav flex-column font-size-2" id="editor-nav-tab">
                <li class="nav-item selected">
                    <a onclick="selectEditorForm(this)" id="configuration" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="personalization" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Personalización</span>
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
        <div class="w-100 h-100">
            <form action="{{route('api.invitations.set-config', $invitation->id)}}" onsubmit="saveInvitationChanges(event, this)">
                <div class="tab-form px-3" id="configuration-form">
                    <h4 class="py-2">Configuración de evento</h4>
                    <div class="row mb-3">
                        <div class="col-4">
                            <x-form.input
                                id="config-form-input"
                                name="host_names"
                                label="Nombre de anfitriones"
                                type="text"
                                placeholder="Juan y Micaela"
                                value="{{$invitation->host_names}}"
                                {{--:errors="(array) $errors->get('meta_title')"--}}
                            />
                        </div>
                        <div class="col-4">
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
                        <div class="col-4">
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
                                placeholder="MarYJulian"
                                value="{{$invitation->path_name}}"
                                extraAttributes="onChange=checkPathName(this) data-original-pathname={{$invitation->path_name}}"
                            />
                        </x-form.input-group>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
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
                        <div class="col-3">
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
                        <div class="col-3">
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
                        <div class="col-3">
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
                        <div class="col-3">
                            <x-form.input
                                id="config-form-input"
                                name="date"
                                label="Fecha"
                                type="date"
                                value="{{$invitation->date}}"
                                :errors="(array) $errors->get('date')"
                            />
                        </div>
                        <div class="col-3">
                            <x-form.input
                                id="config-form-input"
                                name="time"
                                label="Hora"
                                type="time"
                                value="{{$invitation->time}}"

                                :errors="(array) $errors->get('time')"
                            />
                        </div>
                        <div class="col-3">
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
                        <div class="col-3">
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
                    <div class="row mb-3">
                        <div class="col-4">
                            <x-form.input
                                id="config-form-input"
                                name="meta_title"
                                label="Meta titulo"
                                type="text"
                                value="{{$invitation->meta_title}}"
                                :errors="(array) $errors->get('meta_title')"
                            />
                        </div>
                        <div class="col-4">
                            <x-form.input
                                id="config-form-input"
                                name="meta_description"
                                label="Meta descripción"
                                type="text"
                                value="{{$invitation->meta_description}}"
                                :errors="(array) $errors->get('meta_description')"
                            />
                        </div>
                        <div class="col-4">
                            <x-form.input
                                id="config-form-input"
                                name="meta_image"
                                label="Meta imagen"
                                type="file"

                                :errors="(array) $errors->get('meta_image')"
                            />
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-config-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </div>
            </form>
            <form action="{{route('api.invitations.set-style', $invitation->id)}}" onsubmit="saveInvitationChanges(event, this)">
                <div class="tab-form px-3 visually-hidden" id="personalization-form">
                    <h4 class="py-2">Personalización</h4>
                    <div class="row mb-3">
                        <div class="col-4">
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
                        <div class="col-4">
                            <x-form.color-picker
                                id="style-form-input"
                                name="color"
                                label="Color principal"
                                value="{{$invitation->color}}"
                            />
                        </div>
                        <div class="col-4">
                            <x-form.color-picker
                                id="style-form-input"
                                name="background_color"
                                label="Color de fondo"
                                value="{{$invitation->background_color}}"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <x-form.input
                                id="style-form-input"
                                name="padding"
                                label="Relleno"
                                placeholder="20px"
                                type="text"
                                value="{{$invitation->padding}}"
                            />
                        </div>
                        <div class="col-3">
                            <x-form.input
                                id="style-form-input"
                                name="frame_image"
                                label="Marco"
                                type="file"
                            />
                        </div>
                        <div class="col-3">
                            <x-form.select
                                id="style-form-input"
                                name="font"
                                label="Tipo de letra"
                            >
                                @foreach ($fontTypes as $fontType)
                                    <x-form.select-option
                                        value="{{$fontType}}"
                                        label="{{$fontType}}"
                                        selected="{{$invitation->font?->value == $fontType ? true : false}}"
                                    />  
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-3">
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
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </div>
            </form>
            <div class="tab-form px-3 visually-hidden d-flex flex-row nowrap" id="modules-form">
                <div class="w-25">
                    <h4 class="py-2">Módulos<button type="button" class="ms-2 btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#new-module-modal"><i class="fa-light fa-plus"></i></button></h4>
                    <div>
                        <ul id="invitation-modules" class="invitation-modules">
                            @foreach ($invitation->modules as $module)                                
                                <li class="item-module shadow-sm mb-2 {{ $module['fixed'] ? 'fixed-module' : '' }}" data-module-id="{{ $module['display_name'] }}">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <i class="fa-light {{($module['fixed']) ? '' : 'fa-grip-dots-vertical'}} me-2"></i><b>{{$module['display_name']}}</b>
                                        </div>
                                        @if (!$module['on_plan'])
                                            <button class="btn btn-sm btn-white" data-url="{{route('api.invitation.delete-module', ['invitation' => $invitation->id, 'module' => $module['name'], 'displayName' => $module['display_name']])}}" onclick="deleteModule(this)"><i class="fa-light fa-trash-can"></i></button>
                                        @endif

                                        <button class="btn btn-sm btn-white module-edit-button" onclick="showForm(this, '{{$module['display_name']}}')"><i class="fa-light fa-pen-to-square"></i></button>
                                        <div class="form-check form-switch form-check-reverse">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="statusModuleSwitch(this, '{{ $module['name'] }}')" {{($module['active']) ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="px-4 w-100" id="module-form">
                    
                </div>
            </div>
            <div class="tab-form px-3 visually-hidden" id="logs-form">
                <h4 class="py-2">Logs</h4>
            </div>
        </div>
    </main>

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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-form.select
                            id="module-select"
                            name="new_module"
                            label="Modulos disponibles"
                        >
                            @foreach ($availableModules as $available)
                                <x-form.select-option
                                    value="{{$available['name']}}"
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
    </script>
    <script src="{{ asset('inspinia/plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('inspinia/plugins/jquery-ui/js/jquery-ui.min.js') }}"></script>

    <script src="{{asset('js/invitation-editor.js')}}"></script>
    <script src="{{asset('js/invitation-modules.js')}}"></script>
</x-admin.layout>
<x-admin.layout 
    navBarSelected="templates"
    pageTabTitle='Plantillas'
    overflowHidden="true"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('inspinia/plugins/jquery-ui/js/jquery-ui.min.js'),

        asset('js/template-editor.js'),
        asset('js/template-modules.js'),
    ]"
>
    <div aria-label="breadcrumb" style="height: 4vh">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('templates.index')}}" class="link-dark">Templates</a></li>
            <li class="breadcrumb-item active fw-bold text-black" aria-current="page">Editor</li>
        </ol>
    </div>

    <div class="d-flex flex-row justify-items-between overflow-x-hidden overflow-y-visible w-100" style="height: 14vh;">
        <div class="w-100">
            <div class="d-flex flex-nowrap">
                <div>
                    <h5 class="display-5">{{$template->name}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-lg-row flex-column overflow-hidden pb-5" style="height: 81vh;">
        <nav class="navbar-secondary mb-3 ms-sm-3 ms-0">
            <ul class="nav navbar-nav flex-row flex-lg-column font-size-2" id="editor-nav-tab">
                <li class="nav-item selected">
                    <a onclick="selectEditorForm(this)" id="general" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>General</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="modules" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Módulos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="w-100 overflow-hidden">
            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto" id="general-form">
                <form action="{{route('api.templates.update', $template->id)}}" onsubmit="saveTemplateChanges(event, this)">
                    <h4 class="py-2">Configuración de evento</h4>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-8 mb-3 mb-sm-0">
                            <x-form.input
                                id="general-form-input"
                                name="name"
                                label="Nombre de plantilla"
                                type="text"
                                
                                value="{{$template->name}}"
                            />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.input
                                id="general-form-input"
                                name="duration"
                                label="Duración del evento"
                                type="text"
                                
                                value="{{$template->duration}}"
                            />
                        </div>
                        <div class="col-6 col-sm-4 mb-3 mb-sm-0">
                            <x-form.select id="general-form-input" name="event" label="Tipo de evento">
                                @foreach ($eventTypes as $eventType)
                                    <x-form.select-option
                                        value="{{$eventType}}"
                                        label="{{$eventType}}"
                                        selected="{{($template->event->value == $eventType) ? true : false}}"
                                    />
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-4 mb-3 mb-sm-0">
                            <x-form.select id="general-form-input" name="plan" label="Plan">
                                @foreach ($planTypes as $planType)
                                    <x-form.select-option
                                        value="{{$planType}}"
                                        label="{{$planType}}"
                                        selected="{{($template->plan->value == $planType) ? true : false}}"
                                    />
                                    
                                @endforeach
                            </x-form.select>
                        </div>
                    </div>
                    <h4 class="py-2">Estilo</h4>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.select
                                id="general-form-input"
                                name="style"
                                label="Estilo"
                            >
                                @foreach ($styleTypes as $styleType)
                                    <x-form.select-option
                                        value="{{$styleType}}"
                                        label="{{$styleType}}"
                                        selected="{{$template->style?->value == $styleType ? true : false}}"
                                    />  
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.color-picker
                                id="general-form-input"
                                name="color"
                                label="Color principal"
                                value="{{$template->color}}"
                            />
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.color-picker
                                id="general-form-input"
                                name="background_color"
                                label="Color de fondo"
                                value="{{$template->background_color}}"
                            />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                            <x-form.input
                                id="general-form-input"
                                name="padding"
                                label="Relleno"
                                
                                type="text"
                                value="{{$template->padding}}"
                            />
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.select
                                id="general-form-input"
                                name="font"
                                label="Tipo de letra"
                            >
                                @foreach ($fontTypes as $fontType)
                                    <x-form.select-option
                                        value="{{$fontType}}"
                                        label="{{$fontType}}"
                                        selected="{{$template->font?->value == $fontType ? true : false}}"
                                    />  
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="col-6 col-sm-4">
                            <x-form.select
                                id="general-form-input"
                                name="icon_type"
                                label="Tipo de icono"
                            >
                                <x-form.select-option
                                    value="Animado"
                                    label="Animado"
                                    selected="{{$template->icon_type == 'Animado' ? true : false}}"
                                />  
                                <x-form.select-option
                                    value="Estatico"
                                    label="Estatico"
                                    selected="{{$template->icon_type == 'Estatico' ? true : false}}"
                                />  
                            </x-form.select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-general-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </form>
            </div>
            <div class="tab-form px-3 h-100 overflow-auto visually-hidden d-flex flex-column flex-md-row nowrap" id="modules-form">
                @livewire('admin.invitations.editor.modules-list', ['moduleOwner' => $template, 'modules' => $modules])
                <div class="px-4 pb-5 w-100" style="{{(isMobile()) ? 'margin-bottom: 50px !important;' : ''}}" id="module-form">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="save-changes-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
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
                <form method="POST" action="{{route('api.template.add-module', ['template' => $template->id])}}" onsubmit="newModule(event, this)">
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
        window.INVITATION_MODULES_URL = "{{route('api.template.modules', ['template' => $template->id])}}";
    </script>

</x-admin.layout>
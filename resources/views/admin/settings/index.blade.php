<x-admin.layout navBarSelected="settings" dabatable="false" dataTableName="" jqueryUI="true" pageTabTitle="Ajustes"
    :jsScripts="[
        asset('js/settings.js')
    ]"
>
    
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <div>
            <h5 class="display-5">Ajustes</h5>
        </div>
    </header>

    <main class="d-flex flex-lg-row flex-column overflow-hidden pb-5">
        <nav class="navbar-secondary mb-3 ms-sm-3 ms-0">
            <ul class="nav navbar-nav flex-row flex-lg-column font-size-2" id="editor-nav-tab">
                <li class="nav-item selected">
                    <a onclick="selectEditorForm(this)" id="invitations" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Invitaciones</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="fonts" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Fuentes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="icons" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Iconos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="selectEditorForm(this)" id="colors" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Colores</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="w-100 overflow-hidden">

            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto" id="invitations-form">
                <h4 class="py-2">Configuración de invitaciones</h4>
                <form action="{{route('api.settings.set-invitations-settings')}}" onsubmit="saveInvitationChanges(event, this)">
                    @csrf
                    <div class="mb-3">
                        <x-form.input-group label="Periodo de validez" labelFor="path_name"> {{-- :errors="(array) $errors->get('path_name')">--}}
                            <span class="input-group-text" id="basic-addon3">Hasta: </span>

                            <x-form.input
                                name="valid_time"
                                id="invitations-form-input"
                                value="{{$settings->value}}"
                            />
                            <span class="input-group-text" id="basic-addon3"> dias.</span>

                        </x-form.input-group>
                    </div>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-invitations-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </form>
            </div>
            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto visually-hidden" id="fonts-form">
                <h4 class="py-2">Fuentes</h4>
                @livewire('admin.settings.fonts-table')    
            </div>
            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto visually-hidden" id="icons-form">
                <h4 class="py-2">Íconos</h4>
                @livewire('admin.settings.icons-table')    
            </div>
            <div class="tab-form px-0 px-sm-3 h-100 pb-5 overflow-auto visually-hidden" id="colors-form">
                <h4 class="py-2">Colores</h4>   
                @livewire('admin.settings.colors-table')
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
    </main>
</x-admin.layout>
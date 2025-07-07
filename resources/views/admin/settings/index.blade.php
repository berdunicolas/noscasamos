<x-admin.layout navBarSelected="settings" dabatable="false" dataTableName="" jqueryUI="true">
    
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <div>
            <h5 class="display-5">Ajustes</h5>
        </div>
    </header>

        
    
    <main class="d-flex flex-row">
        <nav class="navbar-secondary">
            <ul class="nav navbar-nav flex-column font-size-2" id="editor-nav-tab">
                <li class="nav-item selected">
                    <a id="invitations" class="w-100 py-2 text-start text-dark btn btn-white rounded-0">
                        <span>Invitaciones</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="w-45 h-100">
            <form action="{{route('settings.invitations.store')}}" method="POST">
                @csrf
                <div class="tab-form px-3" id="configuration-form">
                    <h4 class="py-2">Configuración de invitaciones</h4>
                    <div class="mb-3">
                        <x-form.input-group label="Periodo de validez" labelFor="path_name"> {{-- :errors="(array) $errors->get('path_name')">--}}
                            <span class="input-group-text" id="basic-addon3">Hasta: </span>

                            <x-form.input
                                name="valid_time"
                                
                                value="{{$settings->value}}"
                            />
                            <span class="input-group-text" id="basic-addon3"> dias.</span>

                        </x-form.input-group>
                    </div>
                    <div class="d-flex flex-row justify-content-end mt-5">
                        <x-form.button id="save-config-btn" type="submit" classes="btn btn-dark">
                            <span class="mx-3">
                                <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                            </span>
                        </x-form.button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-admin.layout>
<x-admin.layout navBarSelected="users"  datatable="true" dataTableName="users-datatable.js">
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Editar seller</p>
    </header>
    <div>
        <form action="{{route('sellers.update', $seller->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input-group label="Nombre" labelFor="path_name" :errors="(array) $errors->get('name')">
                        <span class="input-group-text" id="basic-addon3">Hecho con ❤ por </span>

                        <x-form.input
                            id="name-input"
                            name="name"
                            value="{{$seller->name}}"
                            :errors="(array) $errors->get('name')"
                        />
                    </x-form.input-group>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input
                        name="background"
                        label="Fondo de banner"
                        type="file"
                        value="{{$seller->background}}"
                        :errors="(array) $errors->get('background')"
                    />   
                </div>
                <div class="col-4">
                    <x-form.input
                        name="logo_image"
                        label="Imagen de logo"
                        type="file"
                        value="{{$seller->logo_image}}"
                        :errors="(array) $errors->get('logo_image')"
                    />   
                </div>
                <div class="col-4">
                    <label for="">Opciones de banner</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="checkboxSwitch(this, 'has_banner')" {{$seller->has_banner ? 'checked' : ''}}>
                        <input type="text" hidden name="has_banner" id="has_banner" value="{{$seller->has_banner ? 1 : 0}}">
                        <label class="form-check-label" for="switchCheckChecked">Activar banner</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="checkboxSwitch(this, 'only_logo')" {{$seller->only_logo ? 'checked' : ''}}>
                        <input type="text" hidden name="only_logo" id="only_logo" value="{{$seller->only_logo ? 1 : 0}}">
                        <label class="form-check-label" for="switchCheckChecked">Mostrar solo el logo</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Texto</label>
                <textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$seller->text}}</textarea>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input
                        name="site_link"
                        label="Sitio web"
                        value="{{$seller->site_link}}"
                        :errors="(array) $errors->get('site_link')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        name="ig_link"
                        label="Instagram"
                        value="{{$seller->ig_link}}"
                        :errors="(array) $errors->get('ig_link')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        name="wpp_link"
                        label="Whatsapp"
                        value="{{$seller->wpp_link}}"
                        :errors="(array) $errors->get('wpp_link')"
                    />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input
                        name="tk_link"
                        label="Tiktok"
                        value="{{$seller->tk_link}}"
                        :errors="(array) $errors->get('tk_link')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        name="x_link"
                        label="X/Twitter"
                        value="{{$seller->x_link}}"
                        :errors="(array) $errors->get('x_link')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        name="ytube_link"
                        label="Youtube"
                        value="{{$seller->ytube_link}}"
                        :errors="(array) $errors->get('ytube_link')"
                    />
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end mt-5">
                <x-form.button id="save-config-btn" type="submit" classes="btn btn-dark">
                    <span class="mx-4">
                        <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                    </span>
                </x-form.button>
            </div>
        </form>
    </div>

    <script>
        function checkboxSwitch(checkbox, inputId) {
            let input = document.getElementById(inputId);
            input.value = checkbox.checked ? 1 : 0;
        }
    </script>
</x-admin.layout>

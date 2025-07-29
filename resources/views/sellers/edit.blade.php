<x-admin.layout navBarSelected="sellers"  datatable="false"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('js/upload-zone.js'),

    ]"
>
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Editar seller</p>
    </header>
    <div>
        <form action="{{route('api.sellers.update', $seller->id)}}" method="POST" enctype="multipart/form-data" onsubmit="submitHandler(this, event)">
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
                    <x-form.upload-zone label="Fondo de banner" zoneOwner="seller" zoneName="banner_bg" :isMultiple=false>
                        @if($seller->media('banner_bg')->first())
                            <div class="preview-item">
                                <img src="{{$seller->media('banner_bg')->first()?->getMediaUrl()}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'seller', 'banner_bg')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( ['seller' => ['banner_bg' => $seller->media('banner_bg')->first()?->getMediaUrl()]])
                    </p>
                </div>
                <div class="col-4">
                    <x-form.upload-zone label="Imagen de logo" zoneOwner="seller" zoneName="banner_logo" :isMultiple=false>
                        @if($seller->media('banner_logo')->first())
                            <div class="preview-item">
                                <img src="{{$seller->media('banner_logo')->first()?->getMediaUrl()}}" alt="preview">
                                <button type="button" class="remove-btn" onclick="eliminarImagen(this, 'seller', 'banner_logo')">×</button>
                            </div>
                        @endif
                    </x-form.upload-zone>
                    <p class="selectedFilesUpdater" hidden>
                        @json( ['seller' => ['banner_logo' => $seller->media('banner_logo')->first()?->getMediaUrl()]])
                    </p>
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
                    <x-form.input-group label="Sitio web">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="site_link"
                            value="{{$seller->site_link}}"
                            :errors="(array) $errors->get('site_link')"
                        />
                    </x-form.input-group>
                </div>
                <div class="col-4">
                    <x-form.input-group label="Instagram">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="ig_link"
                            value="{{$seller->ig_link}}"
                            :errors="(array) $errors->get('ig_link')"
                        />
                    </x-form.input-group>
                </div>
                <div class="col-4">
                    <x-form.input-group label="Whatsapp">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="wpp_link"
                            value="{{$seller->wpp_link}}"
                            :errors="(array) $errors->get('wpp_link')"
                        />
                    </x-form.input-group>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input-group label="Tiktok">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="tk_link"
                            value="{{$seller->tk_link}}"
                            :errors="(array) $errors->get('tk_link')"
                        />
                    </x-form.input-group>
                </div>
                <div class="col-4">
                    <x-form.input-group label="X/Twitter">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="x_link"
                            value="{{$seller->x_link}}"
                            :errors="(array) $errors->get('x_link')"
                        />
                    </x-form.input-group>
                </div>
                <div class="col-4">
                    <x-form.input-group label="Youtube">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <x-form.input
                            name="ytube_link"
                            value="{{$seller->ytube_link}}"
                            :errors="(array) $errors->get('ytube_link')"
                        />
                    </x-form.input-group>
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

        async function fetchMediaAsBlob(url) {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Error al descargar la imagen: ${url}`);
            }
            return await response.blob();
        }

        async function uptateSelectedFiles(field) {
            const objTarget = Object.keys(field)[0];
            const data = field[objTarget];

            if(selectedFiles[objTarget] === undefined) selectedFiles[objTarget] = {};

            
            try {
                for (const [key, value] of Object.entries(data)) {
                    if(selectedFiles[objTarget][key] === undefined) selectedFiles[objTarget][key] = Array.isArray(value) ? [] : null;

                    pushInSelectedFiles(objTarget, key, value);
                }
            } catch (error) {
                console.error('Error al actualizar selected files:', error);
            }
        }

        async function pushInSelectedFiles(objTarget, key, data) {

            if (!data) return;
            
            const urls = Array.isArray(data) ? data : [data];
            
            try {
                const blobs = await Promise.all(urls.map(fetchMediaAsBlob));
                        
                if(Array.isArray(selectedFiles[objTarget][key])) {
                    selectedFiles[objTarget][key] = blobs;
                } else {
                    selectedFiles[objTarget][key] = blobs[0];
                }
            } catch (error) {
                console.error('Error al convertir imágenes a blob:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            let selectedFilesUpdaters = document.getElementsByClassName('selectedFilesUpdater');
            
            Array.from(selectedFilesUpdaters).map(function (field) {
                field = JSON.parse(field.innerHTML);
                uptateSelectedFiles(field);
            });
        });

        function checkboxSwitch(checkbox, inputId) {
            let input = document.getElementById(inputId);
            input.value = checkbox.checked ? 1 : 0;
        }

        let selectedFiles = {
            seller: {
                banner_bg: null,
                banner_logo: null
            }
        };

        window.makeSortableGaleria = function () {return 0;};
        window.makeSortableCoverDesktop = function () {return 0;};
        window.makeSortableCoverMobile = function () {return 0;};

        function submitHandler(form, e) {
            e.preventDefault();

            const formData = new FormData(form);

            // Agregamos los archivos si existen
            if (selectedFiles['seller']['banner_bg']) {
                formData.append('banner_bg', selectedFiles['seller']['banner_bg']);
            }

            if (selectedFiles['seller']['banner_logo']) {
                formData.append('banner_logo', selectedFiles['seller']['banner_logo']);
            }

            // Envío manual con fetch
            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.ok ? response.json() : Promise.reject(response))
            .then(data => {
                showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
            })
            .catch(error => {
                showToast( '<i class="fa-duotone fa-light fa-triangle-exclamation ms-3 me-2"></i>' + data.message);
            });
        }
    </script>
</x-admin.layout>

<x-admin.layout navBarSelected="users"    datatable="true" dataTableName="users-datatable.js">
    <div class="container-fluid">
        <header class="d-flex flex-row align-items-center" style="height: 105px">
            <p style="font-size: 2em;">Editar seller</p>
        </header>
        <div>
            <form action="{{route('sellers.update', $seller->id)}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <x-form.input
                            id="name-input"
                            name="name"
                            label="Nombre"
                            value="{{$seller->name}}"
    
                            :errors="(array) $errors->get('name')"
                        />
                    </div>
                    <div class="col-6">
                        <x-form.input
                            id="url-input"
                            name="url"
                            label="Url"
                            value="{{$seller->url}}"
    
                            :errors="(array) $errors->get('url')"
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
    </div>
</x-admin.layout>

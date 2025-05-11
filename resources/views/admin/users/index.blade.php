<x-admin.layout navBarSelected="users"    datatable="true" dataTableName="users-datatable.js">
    <div class="container-fluid">
        <header class="d-flex flex-row align-items-center" style="height: 105px">
            <p style="font-size: 2em;">Usuarios</p>
            <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
            data-bs-toggle="modal" data-bs-target="#create-product-modal">
                <span class="mx-3">
                    <i class="fa-light fa-plus-large me-2"></i> Nuevo usuario
                </span>
            </button>
        </header>
        <div>
            <x-table.users :users="$users" />
        </div>
    </div>
    <x-admin.users.new-user-modal />
</x-admin.layout>

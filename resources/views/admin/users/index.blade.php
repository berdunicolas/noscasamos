<x-admin.layout navBarSelected="users"    datatable="true" dataTableName="users-datatable.js" pageTabTitle="Usuarios">
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <h5 class="display-5">Usuarios</h5>
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
    <x-admin.users.new-user-modal />
</x-admin.layout>

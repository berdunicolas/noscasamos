<x-admin.layout navBarSelected="users"    datatable="true" dataTableName="users-datatable.js">
    <header class="">
        <h5 class="display-5 header-section">Usuarios</h5>
    </header>
    <div class="mt-5 container">
        <div class="d-flex">
            <button type="button" class="btn btn-outline-dark btn-lg rounded-1 font-size-1 font-bold my-2 ms-auto" 
                data-bs-toggle="modal" data-bs-target="#create-product-modal">
                Nuevo usuario
            </button>
        </div>
        
        <div class="mt-1 rounded-1 p-3 shadow">
            <x-table.users :users="$users" />
        </div>
        
    </div>
    <x-admin.users.new-user-modal />
</x-admin.layout>

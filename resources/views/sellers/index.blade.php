<x-admin.layout navBarSelected="sellers" datatable="true" dataTableName="sellers-datatable.js">
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Sellers</p>
        <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
        data-bs-toggle="modal" data-bs-target="#new-seller-modal">
            <span class="mx-3">
                <i class="fa-light fa-plus-large me-2"></i> Nuevo seller
            </span>
        </button>
    </header>
    <div>
        <x-table.sellers />
    </div>
    <x-admin.sellers.new-seller-modal />
</x-admin.layout>

<x-admin.layout 
    navBarSelected="templates" 
    pageTabTitle='Plantillas'
    :jsScripts="[
        asset('js/templates-datatable.js'),
    ]"
    >

    <header class="d-flex flex-row align-items-center" style="min-height: 105px">
        <h5 class="display-5">Plantillas</h5>
        <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
        data-bs-toggle="modal" data-bs-target="#create-template-modal">
            <span class="mx-3">
                <i class="fa-light fa-plus-large me-2"></i> Nueva plantilla
            </span>
        </button>
    </header>

    <div class="mt-4">
        <x-table.templates />
    </div>

    <script>
    </script>
</x-admin.layout>
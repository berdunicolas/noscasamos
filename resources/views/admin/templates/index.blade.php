<x-admin.layout 
    navBarSelected="templates" 
    pageTabTitle='Plantillas'
    :datatable="true"
    dataTableName="templates-datatable.js"
    >

    <header class="d-flex flex-row align-items-center" style="min-height: 105px">
        <h5 class="display-5">Plantillas</h5>
        <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
        data-bs-toggle="modal" data-bs-target="#new-template-modal">
            <span class="mx-3">
                <i class="fa-light fa-plus-large me-2"></i> Nueva plantilla
            </span>
        </button>
    </header>

    <div class="mt-4">
        <x-table.templates />
    </div>

    <x-admin.templates.new-template-modal />
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás seguro?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    Esta acción eliminará la plantilla permanentemente.
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-dark" id="confirmDeleteBtn" data-bs-dismiss="modal" onclick="deleteTemplate()"><i class="fa-light fa-trash me-2"></i>Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
</x-admin.layout>
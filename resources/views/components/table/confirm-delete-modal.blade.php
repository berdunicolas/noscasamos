<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás seguro?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                Esta acción eliminará la invitación permanentemente.
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-dark" id="confirmDeleteBtn" data-bs-dismiss="modal" onclick="{{$onClick}}"><i class="fa-light fa-trash me-2"></i>Eliminar</button>
            </div>
        </div>
    </div>
</div>
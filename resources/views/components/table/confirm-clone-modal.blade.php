<div class="modal fade" id="confirmcloneModal" tabindex="-1" aria-labelledby="confirmcloneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="confirmcloneModalLabel">Clonar invitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                    <x-form.input-group label="URL de la nueva invitación" labelFor="path_name">
                        <span class="input-group-text" id="basic-addon3">https://evnt.ar/</span>
                        <x-form.input
                            id="path_name_input"
                            name="path_name"                            
                            extraAttributes="oninput=checkPathName(this)"
                        />
                    </x-form.input-group>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-dark" id="confirmCloneBtn" data-bs-dismiss="modal" onclick="cloneInvitation()" disabled><i class="fa-light fa-clone me-2"></i>Clonar</button>
            </div>
        </div>
    </div>
</div>
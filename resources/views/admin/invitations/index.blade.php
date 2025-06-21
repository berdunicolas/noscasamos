<x-admin.layout navBarSelected="invitations" datatable="true" dataTableName="invitations-datatable.js">

    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <h5 class="display-5">Invitaciones</h5>
        <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
        data-bs-toggle="modal" data-bs-target="#new-invitation-modal">
            <span class="mx-3">
                <i class="fa-light fa-plus-large me-2"></i>Nuevo evento
            </span>
        </button>
    </header>
    <div>
        <x-table.invitations />
    </div>
    <x-admin.invitations.confirm-delete-modal />
    <x-admin.invitations.confirm-clone-modal />
    <x-admin.invitations.new-invitation-modal />

    <script>
        window.VALIDATE_INVITATION = "{{ route('api.validate-invitation') }}";
    </script>
</x-admin.layout>
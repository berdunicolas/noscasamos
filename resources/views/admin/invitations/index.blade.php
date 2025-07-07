<x-admin.layout navBarSelected="invitations" datatable="true" dataTableName="invitations-datatable.js">

    <header class="d-flex flex-row align-items-center" style="min-height: 105px">
        <h5 class="display-5">Invitaciones</h5>
        <div class="ms-auto btn-group rounded-1">
            <button class="btn btn-dark font-size-1 font-bold"
            data-bs-toggle="modal" data-bs-target="#new-invitation-by-event-modal">
                <span class="mx-3 d-none d-sm-block">
                    <i class="fa-light fa-plus-large me-2"></i> Nueva invitación
                </span>
                <span class="mx-3 d-block d-sm-none">
                    <i class="fa-light fa-plus-large me-2"></i>
                </span>
            </button>
            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu p-0">
                <li>
                    <button class="btn font-size-1 font-bold"
                    data-bs-toggle="modal" data-bs-target="#new-invitation-modal">
                        <span class="mx-3">
                            Nuevo evento
                        </span>
                    </button>
                </li>
            </ul>
        </div>
    </header>


    <div class="mt-4">
        <x-table.invitations />
    </div>
    
    <x-admin.invitations.confirm-delete-modal />
    <x-admin.invitations.confirm-clone-modal />
    @livewire('table.new-invitation-by-event-modal')
    <x-admin.invitations.new-invitation-modal />

    <script>
        window.VALIDATE_INVITATION = "{{ route('api.validate-invitation') }}";
    </script>
</x-admin.layout>
<x-admin.layout navBarSelected="invitations" datatable="true" dataTableName="invitations-datatable.js">
    <div class="container-fluid" >
        <header class="d-flex flex-row align-items-center" style="height: 105px">
            <p style="font-size: 2em;">Invitaciones</p>             
            <button class="btn btn-dark rounded-1 font-size-1 font-bold my-2 ms-auto" 
            data-bs-toggle="modal" data-bs-target="#new-invitation-modal">
                Nueva invitación
            </button>
        </header>
        <div>
            <x-table.invitations />
        </div>
    </div>
    <x-admin.invitations.new-invitation-modal />
</x-admin.layout>
<x-admin.layout navBarSelected="user"  datatable="true" dataTableName="users-datatable.js" pageTabTitle="Usuarios">
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Información de usuario</p>
    </header>
    <div>
        <h4>{{$user->name}}</h4>
        <ul>
            <li>{{$user->email}}</li>
            <li>{{$user->roles()->first()->name}}</li>
            </ul>
    </div>
</x-admin.layout>

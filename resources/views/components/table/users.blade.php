<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th data-hide="phone,tablet">Role</th>
                                <th data-hide="phone,tablet">Activo</th>
                                <th data-hide="phone,tablet">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{---
                            @foreach ($users as $user)
                            <tr class="gradeC">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->first()->name}}</td>
                                <td>{{($user->email_verified_at !== null) ? 'Activo' : 'No activo'}}</td>
                                <td></td>
                            </tr>
                            @endforeach--}}
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<x-admin.layout navBarSelected="users"    datatable="true" dataTableName="users-datatable.js">
    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Editar usuario</p>
    </header>
    <div>
        <form action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input
                        id="name-input"
                        name="name"
                        label="Nombre"
                        value="{{$user->name}}"

                        :errors="(array) $errors->get('name')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        id="email-input"
                        name="email"
                        label="Correo"
                        type="email"
                        value="{{$user->email}}"

                        :errors="(array) $errors->get('email')"
                    />
                </div>
                <div class="col-4">
                    <x-form.select 
                        name="role"
                        label="Rol"
                    >
                        @foreach ($roles as $role)
                            <x-form.select-option 
                                value="{{$role->name}}"
                                label="{{$role->name}}"
                            />
                        @endforeach
                    </x-form.select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input
                        id="password-input"
                        name="password"
                        label="Contraseña"
                        type="password"
                        

                        :errors="(array) $errors->get('password')"
                    />
                </div>
                <div class="col-4">
                    <x-form.input
                        id="confirmar-input"
                        name="password_confirmation"
                        label="Confirmar contraseña"
                        type="password"
                        

                        :errors="(array) $errors->get('password_confirmation')"
                    />
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end mt-5">
                <x-form.button id="save-config-btn" type="submit" classes="btn btn-dark">
                    <span class="mx-4">
                        <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                    </span>
                </x-form.button>
            </div>
        </form>
    </div>
</x-admin.layout>

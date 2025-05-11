<div class="modal fade rounded-1 modal-lg" id="create-product-modal" tabindex="-1" aria-labelledby="create-product-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h4 class="modal-title">Registrar usuario</h4>
          <button type="button" class="btn btn-close btn-white rounded-1" data-bs-dismiss="modal" id="close-modal-btn" aria-label="Close"></button>
        </div>
        <form action="" onsubmit="newUser(event)" id="new-product-form">
            <div>
                <div class="p-3">
                    <div class="mb-3">
                        <x-form.input
                            name="name"
                            label="Nombre de usuario"
                            placeholder="Nombre y apellido"
                            :errors="(array) $errors->get('name')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.input
                            name="email"
                            label="Correo"
                            placeholder="example@email.com"
                            type="email"
                            :errors="(array) $errors->get('email')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.input
                            name="password"
                            label="Contraseña"
                            placeholder="********"
                            type="password"
                            :errors="(array) $errors->get('password')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.input
                            name="password_confirmation"
                            label="Confirmar contraseña"
                            placeholder="********"
                            type="password"
                        />
                    </div>
                    <div class="mb-3">
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

            <div class="modal-footer border-0">
              <x-form.button type="submit" classes="btn btn-dark">Registrar usuario</x-form.button>
            </div>
        </form>
      </div>
    </div>
</div>
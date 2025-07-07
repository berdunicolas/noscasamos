<div class="modal fade rounded-1 modal-lg" id="new-seller-modal" tabindex="-1" aria-labelledby="new-seller-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h4 class="modal-title">Crear seller</h4>
          <button type="button" class="btn btn-close btn-white rounded-1" data-bs-dismiss="modal" id="close-modal-btn" aria-label="Close"></button>
        </div>
        <form action="" onsubmit="newSeller(event)" id="new-seller-form" enctype="multipart/form-data">
            <div>
                <div class="p-3">
                    <div class="mb-3">
                        <x-form.input
                            name="name"
                            label="Nombre"
                            
                            :errors="(array) $errors->get('name')"
                        />
                    </div>
                    <div class="mb-3">
                        <x-form.input-group label="Sitio web">
                          <span class="input-group-text" id="basic-addon3">https://</span>
                          <x-form.input
                              name="site_link"
                          />
                      </x-form.input-group>
                    </div>
                </div>

            <div class="modal-footer border-0">
              <x-form.button type="submit" classes="btn btn-dark">Crear seller</x-form.button>
            </div>
        </form>
      </div>
    </div>
</div>
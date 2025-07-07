<div id="{{$module->name}}-module-form" class="module-form visually-hidden">
    <h4>Foot</h4>

    <x-module-forms.form :moduleType="$module->type->value" :moduleName="$module->name" :invitationId="$module->invitation_id" :moduleId="$module->id">
        <div class="mb-3">
            <x-form.input
                name=""
                label="Seller"
                value="{{$module->invitation->seller->name}}"
                extraAttributes="disabled readonly"
            />
        </div>
        <div class="mb-3">
            <x-form.input
                name="foot_text"
                label="Texto de pie"
                value="{!!$module->data['foot_text']!!}"
            />
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <x-form.button id="save-style-btn" type="submit" classes="btn btn-dark">
                <span class="mx-3">
                    <i class="fa-light fa-floppy-disk me-2"></i> Guardar
                </span>
            </x-form.button>
        </div>
    </x-module-forms.form>
</div>
<div class="table-container" style="max-height: 550px; overflow-y: auto;">
    <form action="{{ route('api.settings.icons.store') }}" onsubmit="saveInvitationChanges(event, this)">
        <table class="table">
            <thead style="position: sticky; top: 0; z-index: 2;">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
                <tr>
                    <td>
                        <x-form.input
                            id="icons-form-input"
                            name="icon_name"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.input
                            id="icons-form-input"
                            name="icon_code"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.select
                            id="icons-form-input"
                            name="icon_type"
                        >
                            <x-form.select-option
                                value="Animado"
                                label="Animado"
                            />
                            <x-form.select-option
                                value="Estatico"
                                label="Estatico"
                            />
                        </x-form.select>
                    </td>
                    <td>
                        <x-form.button id="save-icons-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="">
                                <i class="fa-light fa-plus-large"></i>
                            </span>
                        </x-form.button>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($icons as $icon)
                    <tr>
                        <td>{{$icon->icon_name}}</td>
                        <td>{{$icon->icon_code}}</td>
                        <td>{{$icon->icon_type}}</td>
                        <td><button class="btn btn-sm btn-outline-danger" onclick="deleteIcon(event, this)" data-delete-url="{{route('api.settings.icons.destroy', $icon->id)}}"><i class="fa-light fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
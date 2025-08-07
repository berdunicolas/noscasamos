<div class="table-container" style="max-height: 550px; overflow-y: auto;">
    <form action="{{ route('api.settings.colors.store') }}" onsubmit="saveInvitationChanges(event, this)">
        <table class="table">
            <thead style="position: sticky; top: 0; z-index: 2;">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo hex</th>
                    <th scope="col">Acciones</th>
                </tr>
                <tr>
                    <td>
                        <x-form.input
                            id="colors-form-input"
                            name="color_name"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.input
                            id="colors-form-input"
                            name="color_code"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.button id="save-colors-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="">
                                <i class="fa-light fa-plus-large"></i>
                            </span>
                        </x-form.button>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{$color->color_name}}</td>
                        <td>{{$color->color_code}}</td>
                        <td><button class="btn btn-sm btn-outline-danger" onclick="deleteColor(event, this)" data-delete-url="{{route('api.settings.colors.destroy', $color->id)}}"><i class="fa-light fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
<div class="table-container" style="max-height: 550px; overflow-y: auto;">
    <form action="{{ route('api.settings.fonts.store') }}" onsubmit="saveInvitationChanges(event, this)">
        <table class="table">
            <thead style="position: sticky; top: 0; z-index: 2;">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Font family</th>
                    <th scope="col">Url</th>
                    <th scope="col">Acciones</th>
                </tr>
                <tr>
                    <td>
                        <x-form.input
                            id="fonts-form-input"
                            name="font_name"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.input
                            id="fonts-form-input"
                            name="font_family"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.input
                            id="fonts-form-input"
                            name="font_url"
                            type="text"                        
                        />
                    </td>
                    <td>
                        <x-form.button id="save-fonts-btn" type="submit" classes="btn btn-dark" disabled="true">
                            <span class="">
                                <i class="fa-light fa-plus-large"></i>
                            </span>
                        </x-form.button>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($fonts as $font)
                    <tr>
                        <td>{{$font->font_name}}</td>
                        <td>{{$font->font_family}}</td>
                        <td class="text-truncate" style="max-width: 100px">{{$font->font_url}}</td>
                        <td><button class="btn btn-sm btn-outline-danger" onclick="deleteFont(event, this)" data-delete-url="{{route('api.settings.fonts.destroy', $font->id)}}"><i class="fa-light fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
<div class="w-25">
    <h4 class="py-2">Módulos<button type="button" class="ms-2 btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#new-module-modal"><i class="fa-light fa-plus"></i></button></h4>
    <div class="">
        <ul id="invitation-modules" class="invitation-modules">
            @foreach ($modules as $module)            
                <li class="item-module shadow-sm mb-2 {{ $module['fixed'] ? 'fixed-module' : '' }}" data-module-id="{{ $module['display_name'] }}">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <i class="fa-light {{($module['fixed']) ? '' : 'fa-grip-dots-vertical'}} me-2"></i><b>{{$module['display_name']}}</b>
                        </div>
                        @if (!$module['on_plan'])
                            <button class="btn btn-sm btn-white" data-url="{{route('api.invitation.delete-module', ['invitation' => $invitation->id, 'module' => $module->id])}}" onclick="deleteModule(this)"><i class="fa-light fa-trash-can"></i></button>
                        @endif

                        <button class="btn btn-sm btn-white module-edit-button" onclick="showForm(this, '{{$module['name']}}')"><i class="fa-light fa-pen-to-square"></i></button>
                        <div class="form-check form-switch form-check-reverse">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="statusModuleSwitch(this, '{{ $module['id'] }}')" {{($module['active']) ? 'checked' : ''}}>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="pb-3">
    <h4 class="py-2">Módulos<button type="button" class="ms-2 btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#new-module-modal"><i class="fa-light fa-plus"></i></button></h4>
    <div class="overflow-x-auto scroll-suave">
        <ul id="invitation-modules" class="invitation-modules d-flex flex-row flex-md-column mb-2">
            @foreach ($modules as $module)            
                <li class="item-module shadow-sm {{ $module['fixed'] ? 'fixed-module' : '' }} m-1 m-md-0" data-module-id="{{ $module['display_name'] }}" style="width: 270px; min-width: 270px">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="d-flex flex-row align-items-center justify-content-start flex-nowrap">
                            @if (!$module['fixed'] && isMobile())  
                            <div class="d-flex me-1">
                                <button class="btn btn-sm btn-white"><i class="fa-duotone fa-light fa-chevron-left"></i></button> {{-- BOTON IZQUIERDO --}}
                                <button class="btn btn-sm btn-white"><i class="fa-duotone fa-light fa-chevron-right"></i></button> {{-- BOTON DERECHO --}}
                            </div>
                            @endif
                            <div class="flex-grow-1 d-flex flex-row flex-nowrap text-nowrap">
                                @if (!isMobile())
                                <i class="fa-light {{($module['fixed']) ? '' : 'fa-grip-dots-vertical'}} me-2 mt-1"></i>
                                @endif
                                <b>{{$module['display_name']}}</b>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center ms-auto justify-content-end flex-nowrap">
                            @if (!$module['on_plan'])
                                <button class="btn btn-sm btn-white" data-url="{{route('api.invitation.delete-module', ['invitation' => $invitation->id, 'module' => $module->id])}}" onclick="deleteModule(this)"><i class="fa-light fa-trash-can"></i></button>
                            @endif
                            <button class="btn btn-sm btn-white module-edit-button" onclick="showForm(this, '{{$module['name']}}')"><i class="fa-light fa-pen-to-square"></i></button>
                            <div class="form-check form-switch form-check-reverse">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="statusModuleSwitch(this, '{{ $module['id'] }}')" {{($module['active']) ? 'checked' : ''}}>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
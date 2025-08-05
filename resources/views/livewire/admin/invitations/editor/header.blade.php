<div class="d-flex flex-row justify-items-between overflow-x-hidden overflow-y-visible w-100" style="height: 14vh;">
    <div class="w-100">
        <div class="d-flex flex-nowrap">
            <div>
                <h5 class="display-5">{{$invitation->event->name}}</h5>
            </div>
            <div class="ms-auto d-none d-xl-flex flex-nowrap justify-content-center align-items-start">
                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#linkModal"><span class="mx-3"><i class="fa-light fa-share me-2"></i>Compartir</span></button>
                <button class="btn btn-outline-dark ms-1"  data-bs-toggle="modal" data-bs-target="#invitadosModal"><span class="mx-3"><i class="fa-light fa-users me-2"></i>Invitados</span></button>
                <a class="btn btn-dark ms-1" href="{{route('invitation', ['invitation' => $invitation->path_name])}}" target="_blank"><span class="mx-3"><i class="fa-light fa-eye me-2"></i>Ver invitación</span></a>
            </div>

            <div class="ms-auto d-block d-xl-none">
                <div class="btn-group">
                    <a class="btn btn-dark d-none d-sm-block" href="{{route('invitation', ['invitation' => $invitation->path_name])}}" target="_blank"><span class="mx-3"><i class="fa-light fa-eye me-2"></i>Ver invitación</span></a>
                    <a class="btn btn-dark d-block d-sm-none rounded-start-2" href="{{route('invitation', ['invitation' => $invitation->path_name])}}" target="_blank"><span><i class="fa-light fa-eye"></i></span></a>
                    <button class="btn btn-dark dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
            
                    <ul class="dropdown-menu dropdown-menu-end overflow-visible z-3" aria-labelledby="dropdownMenuButton">
                        <li>
                            <button class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#linkModal"><span class="mx-3"><i class="fa-light fa-share me-2"></i>Compartir</span></button>
                        </li>
                        <li>
                            <button class="btn dropdown-item"  data-bs-toggle="modal" data-bs-target="#invitadosModal"><span class="mx-3"><i class="fa-light fa-users me-2"></i>Invitados</span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center">
            <div class="d-flex flex-nowrap">
                <span class="me-3 text-nowrap"><i class="fa-light fa-hashtag"></i> {{$invitation->id}}</span>
                <span class="me-3 text-nowrap"><i class="fa-light fa-calendar"></i> {{($invitation->date) ? $invitation->date : 'Sin Fecha' }}</span>
            </div>
            <div class="d-flex flex-nowrap">
                <span class="me-1 badge text-bg-primary text-nowrap">{{$invitation->event->event}}</span>
                
                @switch($invitation->event->plan->value)
                    @case('Clásico')
                        <span class="me-1 badge text-bg-info text-nowrap">{{$invitation->event->plan}}</span>
                        @break
                    @case('Gold')
                        <span class="me-1 badge text-bg-warning text-nowrap">{{$invitation->event->plan}}</span>
                        @break
                    @case('Platino')
                        <span class="me-1 badge text-bg-secondary text-nowrap">{{$invitation->event->plan}}</span>
                        @break
                    @default
                @endswitch
    
                @if ($invitation->active)
                    <span class="me-1 badge text-bg-success text-nowrap">Activo</span>
                @else
                    <span class="me-1 badge text-bg-danger text-nowrap">No activo</span>
                @endif
    
                @if ($invitation->date)
                    @if ($invitation->stillValid())
                        <span class="me-1 badge border text-bg-secondary text-nowrap">No vigente</span>
                    @else
                        <span class="me-1 badge border text-bg-info text-nowrap">Vigente</span>
                    @endif
                @endif
                <span class="me-1 badge border border-black text-black text-nowrap">{{$invitation->seller->name}}</span>    
            </div>
        </div>

    </div>

    <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkModalLabel">Compartir invitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" onchange="guestTokenSwitch(this)" {{($invitation->enable_guest_token) ? 'checked' : ''}}>
                    <label class="form-check-label" for="">Token para invitados: {{$invitation->guest_token}}</label>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" id="linkInput" value="{{route('invitation', ['invitation' => $invitation->path_name])}}" readonly>
                    <button class="btn btn-dark" type="button" onclick="copiarEnlace()">
                        <i class="fa-light fa-copy"></i>
                    </button>
                </div>
            </div>
            </div>
        </div>
        <script>
            function copiarEnlace() {
                const input = document.getElementById("linkInput");
                input.select();
                input.setSelectionRange(0, 99999); // Para móviles
                document.execCommand("copy");
            }
        </script>
    </div>

    <div class="modal fade" id="invitadosModal" tabindex="-1" aria-labelledby="invitadosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <div>
                <h5 class="modal-title" id="invitadosModalLabel">Invitados</h5>
                <small class="text-muted">Código: {{$invitation->plain_token}}</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <table id="example" class="display table table-bordered table-hover w-100">
                <thead>
                    <tr>
                    <th data-priority="1">Nombre</th>
                    <th>Asiste</th>
                    <th>Acompañante</th>
                    <th>Alimentación</th>
                    <th class="none">Email</th>
                    <th class="none">Teléfono</th>
                    <th class="none">Traslado</th>
                    <th class="none">Comentarios</th>
                    <th class="none">Fecha Confirmación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->asiste }}</td>
                        <td>{{ $item->nombre_a }}</td>
                        <td>{{ $item->alimento }}</td>
                        <td class='none'>{{ $item->mail }}</td>
                        <td class='none'>{{ $item->telefono }}</td>
                        <td class='none'>{{ $item->traslado }}</td>
                        <td class='none'>{{ $item->comentarios }}</td>
                        <td class='none'>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{ route('invitation.guests', ['invitation' => $invitation->path_name]) }}" target="_blank" class="btn btn-dark"><span class="mx-3"><i class="fa-light fa-link me-2"></i> Ir a panel</span></a>
            </div>
            </div>
        </div>
    </div>
</div>
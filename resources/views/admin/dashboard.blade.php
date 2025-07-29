<x-admin.layout navBarSelected="dashboard"
    :cssStyles="[
        
    ]"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('inspinia/plugins/chartjs/js/Chart.min.js'),
        asset('js/invitations-datatable.js')
    ]"
    >
    
    <header class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center" style="min-height: 105px">
        <h5 class="display-5">Dashboard</h5>
    </header>
    <div class="row flex-row-reverse justify-content-end mt-3 px-0 px-sm-3 mb-5">
        <div class="col-12 col-sm-6 col-md-4 col-3 pb-3 ">
            <div class="shadow bg-light border-0 rounded-3">
                <button class="btn btn-dark rounded-3 p-2 w-100" data-bs-toggle="modal" data-bs-target="#new-invitation-modal">
                    <div class="text-end px-3 inline-block">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="me-4">
                                <h5 class="display-6 m-0">
                                    <i class="fa-duotone fa-light fa-plus-large"></i>
                                </h5>
                            </div>
                            <div>
                                <h4 class="m-0 text-nowrap">
                                    Crear invitacion
                                </h4>
                                <p class="m-0 text-nowrap">
                                    A partir de un evento
                                </p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="shadow border-0 rounded-3 mt-3">
                <button class="btn btn-outline-dark rounded-3 p-2 w-100" onclick="syncLegacyInvitations(this)" disabled>
                    <div class="text-end px-3 inline-block">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="me-4">
                                <h5 class="display-6 m-0">
                                    <i class="fa-light fa-arrows-rotate"></i>
                                </h5>
                            </div>
                            <div>
                                <h4 class="m-0 text-nowrap">
                                    Sincronizar
                                </h4>
                                <p class="m-0 text-nowrap">
                                    invitaciones legacy
                                </p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-8 shadow rounded-3 py-2 m-0">
            <div class="border-0 pb-4">
                <div class="text-end px-3 inline-block">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="me-4">
                            <h1 class="display-1 m-0">
                                <i class="fa-duotone fa-light fa-envelopes" style="--fa-primary-color: #0000c2; --fa-secondary-color: #0000c2;"></i>
                            </h1>
                        </div>
                        <div>
                            <h1 id="active-invitations" class="display-1 m-0">
                                --
                            </h1>
                        </div>
                    </div>
                    <h3 class="m-0 display-6">
                        Invitaciones activas
                    </h3>
                </div>
            </div>
            <hr>
            <div class="py-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Invitaciones gold
                        <span class="badge text-bg-warning rounded-pill" id="gold-active-invitations">--</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Invitaciones platino
                        <span class="badge text-bg-secondary rounded-pill" id="platinum-active-invitations">--</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Invitaciones clasicas
                        <span class="badge text-bg-info rounded-pill" id="classic-active-invitations">--</span>
                    </li>
                </ul>
            </div>

            <div class="text-end">
                <a href="{{route('invitations.index')}}" class="link-dark ms-auto" >Ir a invitaciones</a>
            </div>
        </div>
    </div>


    <x-admin.invitations.new-invitation-modal />

    <script>
        
        fetch("{{route('api.active-invitations-graph')}}", {
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => {
            let sign = document.getElementById('active-invitations');

            sign.innerHTML = data.total;
            
        });

        fetch("{{route('api.active-invitations-graph')}}?plan=Gold", {
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => {
            let sign = document.getElementById('gold-active-invitations');

            sign.innerHTML = data.total;
            
        });

        fetch("{{route('api.active-invitations-graph')}}?plan=Platino", {
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => {
            let sign = document.getElementById('platinum-active-invitations');

            sign.innerHTML = data.total;
            
        });

        fetch("{{route('api.active-invitations-graph')}}?plan=Clásico", {
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(res => res.json())
        .then(data => {
            let sign = document.getElementById('classic-active-invitations');

            sign.innerHTML = data.total;
            
        });
    </script>

</x-admin.layout> 
<x-admin.layout navBarSelected="dashboard"
    :cssStyles="[
        
    ]"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('inspinia/plugins/chartjs/js/Chart.min.js'),
        asset('js/created-invitations-graph.js'),
        asset('js/invitations-datatable.js')
    ]"
    >
    
    <header class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center" style="min-height: 105px">
        <h5 class="display-5">Dashboard</h5>
        <div class="p-2 d-flex flex-column justify-content-end flex-sm-row">
            <div class="shadow border-0 rounded-3 ms-3 p-2">
                <div class="text-end px-3 inline-block">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="me-4">
                            <h5 class="display-6 m-0">
                                <i class="fa-duotone fa-light fa-envelopes" style="--fa-primary-color: #0000c2; --fa-secondary-color: #0000c2;"></i>
                            </h5>
                        </div>
                        <div>
                            <h4 id="active-invitations" class="m-0">
                                --
                            </h4>
                            <p class="m-0 text-nowrap">
                                Invitaciones activas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow border-0 ms-3 mt-sm-0 mt-3">
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
        </div>
    </header>
    <div class="mt-3">
        <div class="p-2">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between flex-wrap">
                        <div>
                            <h4>Eventos del año</h4>
                        </div>
                        <div class="d-none">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                <x-form.input-group classes="input-group-sm">
                                    <span class="input-group-text" id="basic-addon1">Año:</span>
                                    <x-form.select
                                        id="year-select"
                                        name="year_select"
                                        label=""
                                        selectClasses="form-select-sm"
                                        extraAttributes="onchange=renderCreatedInvitationsGraph()"
                                    >
                                        @foreach ($years as $year)
                                            <x-form.select-option
                                                value="{{$year->year}}"
                                                label="{{$year->year}}"
                                            />
                                        @endforeach
                                    </x-form.select>
                                    <span class="input-group-text" id="basic-addon1">Comparar:</span>
                                    <x-form.select
                                        id="year-diff-select"
                                        name="year_diff_select"
                                        label=""
                                        selectClasses="form-select-sm"
                                        extraAttributes="onchange=renderCreatedInvitationsGraph()"
                                    >
                                        <x-form.select-option
                                            value=""
                                            label="Elegir"
                                        />
                                    </x-form.select>
                                </x-form.input-group>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container" style="position: relative; height: 60vh; width: 100%;"> 
                        <canvas id="created-invitations-graph"></canvas>
                    </div>
                    {{-- width="{{isMobile()? 600: 400}}" height="{{isMobile()? 300: 100}}"--}}
                </div>
            </div>
        </div>
    </div>


    <x-admin.invitations.new-invitation-modal />

    <script>
        window.createdInvitationsGraph = "{{route('api.created-invitations-graph')}}";

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
    </script>

</x-admin.layout> 
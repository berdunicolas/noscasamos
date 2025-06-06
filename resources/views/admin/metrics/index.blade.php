<x-admin.layout navBarSelected="metrics" 
    :cssStyles="[
        
    ]"
    :jsScripts="[
        asset('inspinia/plugins/jquery/js/jquery.min.js'),
        asset('inspinia/plugins/chartjs/js/Chart.min.js'),
        asset('js/created-invitations-graph.js'),
        asset('js/total-invitations-graph.js'),
        asset('js/country-invitations-graph.js'),
    ]"
    >

    <header class="d-flex flex-row align-items-center" style="height: 105px">
        <p style="font-size: 2em;">Estadisticas</p>             
    </header>
    <div>
        <div class="p-2">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between flex-wrap">
                        <div>
                            <h4>Eventos creados</h4>
                        </div>
                        <div class="d-inline-flex">
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
                                        @foreach ($years as $year)
                                            <x-form.select-option
                                                value="{{$year->year}}"
                                                label="{{$year->year}}"
                                            />
                                        @endforeach
                                    </x-form.select>
                                </x-form.input-group>
                            </div>
                        </div>
                    </div>
                    {{--<div class="chart-container" style="position: relative; height: 30vh; width: 80vw;"> --}}
                    <div class="chart-container" style="position: relative; height: 30vh; width: 100%;"> 
                        <canvas id="created-invitations-graph"></canvas>
                    </div>
                    {{-- width="{{isMobile()? 600: 400}}" height="{{isMobile()? 300: 100}}"--}}
                </div>
            </div>
        </div>
        <div class="p-2">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between flex-wrap">
                        <div>
                            <h4>Total de invitaciones</h4>
                        </div>
                        <div class="d-inline-flex">
                            <x-form.input-group classes="input-group-sm me-3">
                                <span class="input-group-text" id="basic-addon1">Desde:</span>
                                <x-form.input 
                                    id="from-date-invitations-total"
                                    name="from_date_invitations_total"
                                    type="date"
                                    extraAttributes="onChange=renderTotalInvitationsGraph()"
                                />
                                <span class="input-group-text" id="basic-addon1">Hasta:</span>
                                <x-form.input 
                                    id="to-date-invitations-total"
                                    name="to_date_invitations_total"
                                    type="date"
                                    extraAttributes="onChange=renderTotalInvitationsGraph()"
                                />
                            </x-form.input-group>

                            <div class="d-inline-flex">
                                <x-form.select
                                    id="by-select"
                                    name="by_select"
                                    label=""
                                    selectClasses="form-select-sm"
                                    extraAttributes="onChange=renderTotalInvitationsGraph()"
                                >
                                    <x-form.select-option
                                        value="seller"
                                        label="Seller"
                                    />
                                    <x-form.select-option
                                        value="plan"
                                        label="Plan"
                                    />
                                    <x-form.select-option
                                        value="creator"
                                        label="Creador"
                                    />
                                </x-form.select>
                            </div>

                        </div>
                    </div>
                    <div class="chart-container" style="position: relative; height: 30vh; width: 100%;"> 
                        <canvas id="total-invitations-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="p-2">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between flex-wrap">
                        <div>
                            <h4>Invitaciones por región</h4>
                        </div>
                        <div class="d-inline-flex">
                            <x-form.input-group classes="input-group-sm me-3">
                                <span class="input-group-text" id="basic-addon1">Desde:</span>
                                <x-form.input 
                                    id="from-date-invitations-country"
                                    name="from-date-invitations-country"
                                    type="date"
                                    extraAttributes="onchange=renderCountryInvitationsGraph()"
                                />
                                <span class="input-group-text" id="basic-addon1">Hasta:</span>
                                <x-form.input 
                                    id="to-date-invitations-country"
                                    name="to-date-invitations-country"
                                    type="date"
                                    extraAttributes="onchange=renderCountryInvitationsGraph()"
                                />
                            </x-form.input-group>

                            <div class="d-inline-flex">
                                <x-form.select
                                    id="country-select"
                                    name="country_select"
                                    label=""
                                    selectClasses="form-select-sm"
                                    extraAttributes="onchange=renderCountryInvitationsGraph()"
                                >
                                    <x-form.select-option
                                        value=""
                                        label="Todos"
                                        selected="true"
                                    />
                                    @foreach ($countries as $country)
                                        <x-form.select-option
                                            value="{{$country->code}}"
                                            label="{{$country->name}}"
                                        />
                                    @endforeach
                                </x-form.select>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container" style="position: relative; height: 30vh; width: 100%;"> 
                        <canvas id="country-invitations-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.createdInvitationsGraph = "{{route('api.created-invitations-graph')}}";
        window.totalInvitationsGraph = "{{route('api.total-invitations-graph')}}";
        window.countryInvitationsGraph = "{{route('api.country-invitations-graph')}}";
    </script>
</x-admin.layout>
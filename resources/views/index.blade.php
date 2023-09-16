@extends('Core::layouts.master')
@section('page-title', 'Dashboard')
@section('page-sub-title', 'Index')
@section('content')

    <div id="kt_content_container" class="container-xxl">

        <div class="row g-5 g-xl-10">

            <div class="col-md-4">

                <div class="card card-flush h-375px">
                    <div class="card-header pt-5">
                        <div class="card-title flex-column">
                            <div class="align-items-center">
                            <span class="fs-2 text-dark ls-n1">
                                Tickets by Status
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body align-items-center">
                        <div class="mb-10">
                            <canvas id="total_tickets_by_status" class="mh-125px"></canvas>
                        </div>

                        <div class="d-flex flex-column w-100">

                            <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                <div class="bullet w-8px h-6px rounded-2 bg-secondary me-3"></div>
                                <div class="text-gray-500 flex-grow-1 me-4"> Pending</div>
                                <div class="fw-bolder text-gray-700 text-xxl-end"> {{$pendingTicketsCount}}</div>
                            </div>

                            <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                <div class="bullet w-8px h-6px rounded-2 bg-warning me-3"></div>
                                <div class="text-gray-500 flex-grow-1 me-4"> In Progress</div>
                                <div class="fw-bolder text-gray-700 text-xxl-end"> {{$inProgressTicketsCount}}</div>
                            </div>

                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                <div class="text-gray-500 flex-grow-1 me-4"> Closed</div>
                                <div class="fw-bolder text-gray-700 text-xxl-end"> {{$closedTicketsCount}}</div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-flush h-375px mb-5">
                    <div class="card-header pt-5">
                        <div class="card-title flex-column">
                            <div class="align-items-center">
                            <span class="fs-2 text-dark ls-n1">
                                Tickets by platform
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body align-items-center">
                        <div class="mb-10">
                            <canvas id="total_tickets_by_platform" class="mh-125px"></canvas>
                        </div>

                        <div class="d-flex flex-column w-100">
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet w-8px h-6px rounded-2 bg-warning me-3"></div>
                                <div class="text-gray-500 flex-grow-1 me-4"> Website</div>
                                <div
                                    class="fw-bolder text-gray-700 text-xxl-end"> {{$websitePlatformTicketsCount}}</div>
                            </div>

                            <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                <div class="text-gray-500 flex-grow-1 me-4"> Whatsapp</div>
                                <div
                                    class="fw-bolder text-gray-700 text-xxl-end"> {{$whatsappPlatformTicketsCount}}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-flush h-375px mb-5">
                    <div class="card-header pt-5">
                        <div class="card-title flex-column">
                            <div class="align-items-center">
                            <span class="fs-2 text-dark ls-n1">
                                Tickets by Type
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body align-items-center">
                        <div class="mb-10">
                            <canvas id="total_tickets_by_type" class="mh-125px"></canvas>
                        </div>

                    </div>
                </div>

            </div>


        </div>

        <div class="row g-5 g-xl-10 mb-xl-10">

            <div class="col-lg-6">
                <div class="card card-flush">
                    <div class="card-header py-5">
                        <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            Tickets By Month
                        </span>
                            <span class="text-primary mt-1 fw-semibold fs-6">
                            Tickets from bla
                        </span>
                        </h3>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <canvas id="total_tickets_by_month" class="min-h-auto ps-4 pe-6"
                                style="height: 420px; min-height: 420px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-flush">
                    <div class="card-header py-5">
                        <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            Tickets By Zone
                        </span>
                            <span class="text-primary mt-1 fw-semibold fs-6">
                            Tickets from bla
                        </span>
                        </h3>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <canvas id="total_tickets_by_zone" class="min-h-auto ps-4 pe-6"
                                style="height: 420px; min-height: 420px;"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/charts.custom.js') }}"></script>

    <script>

        // -------------- total tickets by status --------------
        // ----------------------------------------------------
        const totalTicketsByStatus = document.getElementById('total_tickets_by_status');
        // Chart config
        const totalTicketsByStatusConfig = {
            type: 'doughnut',
            data: data = {
                datasets: [{
                    data: [50, 34, 1032],
                    backgroundColor: [
                        '#B5B5C3',
                        '#ffc700',
                        '#50cd89',
                    ],
                }],
            },
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            },
            defaults: {}
        };
        // Init ChartJS
        new Chart(totalTicketsByStatus, totalTicketsByStatusConfig);

        // -------- total orders by platform --------
        // ----------------------------------------------------
        const totalTicketsByPlatform = document.getElementById('total_tickets_by_platform');
        // Chart config
        const totalTicketsByPlatformConfig = {
            type: 'doughnut',
            data: data = {
                datasets: [{
                    data: [{{$websitePlatformTicketsCount}}, {{$whatsappPlatformTicketsCount}}],
                    backgroundColor: [
                        '#ffc700',
                        '#f1416c',
                    ],
                }],
            },
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            },
            defaults: {}
        };
        // Init ChartJS
        new Chart(totalTicketsByPlatform, totalTicketsByPlatformConfig);

        // -------- total orders by type --------
        // ----------------------------------------------------
        const totalTicketsByType = document.getElementById('total_tickets_by_type');
        // Chart config
        const totalTicketsByTypeConfig = {
            type: 'doughnut',
            data: data = {
                datasets: [{
                    data:
                        [12, 43,]
                    ,
                    backgroundColor: [
                        '#6610f2',
                        '#f1416c',

                    ],
                }],
            },
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            },
            defaults: {}
        };
        // Init ChartJS
        new Chart(totalTicketsByType, totalTicketsByTypeConfig);

        // -------- total tickets by month --------
        // ----------------------------------------------------
        const totalTicketsByMonth = document.getElementById('total_tickets_by_month');
        // Chart config
        const totalTicketsByMonthConfig = {
            type: 'line',
            data: data = {
                labels: ['dsd', 'sd'],
                datasets: [{
                    label: 'Tickets',
                    data: [22, 44],
                    fill: true,
                    backgroundColor: [
                        '#009ef736',
                    ],
                    borderColor: [
                        '#009ef7',
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,

            },
            defaults: {}
        };
        // Init ChartJS
        new Chart(totalTicketsByMonth, totalTicketsByMonthConfig);

        // -------- total tickets by zone --------
        // ----------------------------------------------------
        const totalTicketsByZone = document.getElementById('total_tickets_by_zone');
        // Chart config
        const totalTicketsByZoneConfig = {
            type: 'bar',
            data: data = {
                labels: ['sd'],
                datasets: [{
                    label: 'Tickets',
                    data: [2],
                    fill: true,
                    backgroundColor: [
                        '#50cd8936',
                    ],
                    borderColor: [
                        '#50cd89',
                    ],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,

            },
            defaults: {}
        };
        // Init ChartJS
        new Chart(totalTicketsByZone, totalTicketsByZoneConfig);

    </script>

    <script>
        function getStatisticsBySeasonId(element) {
            let action = $(element).find(':selected').data('action');
            window.location = action

        }
    </script>

@endsection


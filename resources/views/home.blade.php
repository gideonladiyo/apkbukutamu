@extends('layouts.master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row justify-content-between">
            {{-- Card Total Tamu Hari Ini --}}
            <div class="col-lg-3 col-md-7">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $tamuHariIni }}</h2>
                        <div class="m-b-5">Total Tamu Hari Ini</div><i class="ti-book widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            {{-- Card Total Tamu Tahun Ini --}}
            <div class="col-lg-3 col-md-7">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $tamuTahunIni }}</h2>
                        <div class="m-b-5">Total Tamu Tahun {{ date('Y') }}</div><i class="fa fa-calendar widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            {{-- Card Total Pegawai --}}
            <div class="col-lg-3 col-md-7">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $pegawai }}</h2>
                        <div class="m-b-5">Total Pegawai</div><i class="fa fa-address-card widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            {{-- Card Total Userr --}}
            <div class="col-lg-3 col-md-7">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $user }}</h2>
                        <div class="m-b-5">Total User</div><i class="ti-user widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Chart --}}
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Line Chart</div>
                    </div>
                    <div class="ibox-body">
                        <div>
                            <canvas id="line_chart" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Bar Chart</div>
                    </div>
                    <div class="ibox-body">
                        <div>
                            <canvas id="bar_chart" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            // Konfigurasi line chart
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ],
                datasets: [{
                    label: "Reservasi",
                    backgroundColor: 'rgba(52,152,219, 0.5)',
                    borderColor: 'rgba(52,152,219, 1)',
                    pointBorderColor: "#fff",
                    data: [
                        @foreach ($reservasiMonthlyCount as $data)
                            {{ $data }},
                        @endforeach
                    ],
                }, {
                    label: "Berkunjung",
                    backgroundColor: 'rgba(213,217,219, 0.9)',
                    borderColor: 'rgba(213,217,219, 1)',
                    pointBorderColor: "#fff",
                    data: [
                        @foreach ($tamuMonthlyCount as $data)
                            {{ $data }},
                        @endforeach
                    ],
                }]
            };
            var lineOptions = {
                responsive: true,
                maintainAspectRatio: false
            };
            var ctx = document.getElementById("line_chart").getContext("2d");
            new Chart(ctx, {
                type: 'line',
                data: lineData,
                options: lineOptions
            });

            // Bar Chart example

            var barData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ],
                datasets: [{
                        label: "Reservasi",
                        backgroundColor: '#DADDE0',
                        data: [
                            @foreach ($reservasiMonthlyCount as $data)
                                {{ $data }},
                            @endforeach
                        ],
                    },
                    {
                        label: "Berkunjung",
                        backgroundColor: '#2ecc71',
                        borderColor: "#fff",
                        data: [
                            @foreach ($tamuMonthlyCount as $data)
                                {{ $data }},
                            @endforeach
                        ],
                    }
                ]
            };
            var barOptions = {
                responsive: true,
                maintainAspectRatio: false
            };

            var ctx = document.getElementById("bar_chart").getContext("2d");
            new Chart(ctx, {
                type: 'bar',
                data: barData,
                options: barOptions
            });

        });
    </script>
@endpush

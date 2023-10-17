@extends('layouts.app')
@section('title', 'Monitoring')

@push('css')
    <style>
        .circle-container {
            width: 300px;
            height: 300px;
            background-color: #e3f3ff;
            border: 7px solid #007bff;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .circle-value {
            color: #007bff;
            font-size: 54px;
        }

        .circle-unit {
            color: #007bff;
            font-size: 28px;
        }

        .circle-time {
            color: #007bff;
            font-size: 18px;
        }

        .badge {
            display: inline-block;
            padding: .7em 1em;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .475rem;
        }

        .light-danger {
            color: #f1416c;
            background-color: #fff5f8;
            border: 1px solid #f1416c;
        }

        .light-primary {
            color: #009ef7;
            background-color: #ecf8ff;
            border: 1px solid #009ef7;
        }

        .light-success {
            color: #50cd89;
            background-color: #e8fff3;
            border: 1px solid #50cd89;
        }

        .light-warning {
            color: #ffc700;
            background-color: #fff8dd;
            border: 1px solid #ffc700;
        }

        .light-dark {
            color: #1c1c1b;
            background-color: #fff8dd;
            border: 1px solid #1c1c1b;
        }

        @media (max-width: 768px) {
            .circle-container {
                width: 200px;
                height: 200px;
                font-size: 24px;
            }

            .circle-value {
                font-size: 32px;
            }

            .circle-unit {
                font-size: 18px;
            }

            .circle-time {
                font-size: 10px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Monitoring Data</h2>
                        <p>Sistem ini memanfaatkan teknologi untuk mengukur dan merekam parameter-parameter kritis seperti pH, kekeruhan (turbidity), suhu (temperature), dan total dissolved solids (TDS).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" data-aos="fade-up">
        <div
            class="d-sm-flex align-items-center justify-content-between mb-4 mt-5"
        >
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5 p-5 text-center rounded light-primary">
                    <h3 class="mb-3">Last Updated</h3>
                    <h5 class="dataTime mb-0">-</h5>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5 p-5 text-center rounded" id="cardStatusAir">
                    <h3 class="mb-3">Status Air</h3>
                    <h5 id="textStatusAir" class="mb-0">-</h5>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5 p-5 text-center rounded" id="cardStatusConnection">
                    <h3 class="mb-3">Status Sensor</h3>
                    <h5 id="textStatusConnection" class="mb-0">-</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">pH Value</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-center">
                            <div class="circle-container">
                                <h1 class="dataTime circle-time">-</h1>
                                <h1 id="dataPh" class="circle-value">0</h1>
                                <h1 class="circle-unit mb-0">pH</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">pH Chart</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="chartDataPh"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">Temperature Value</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-center">
                            <div class="circle-container">
                                <h1 class="dataTime circle-time">-</h1>
                                <h1 id="dataTemp" class="circle-value">0</h1>
                                <h1 class="circle-unit mb-0">°C</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">Temperature Chart</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="chartDataTemp"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">TDS Value</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-center">
                            <div class="circle-container">
                                <h1 class="dataTime circle-time">-</h1>
                                <h1 id="dataTds" class="circle-value">0</h1>
                                <h1 class="circle-unit mb-0">PPM</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">TDS Chart</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="chartDataTds"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">Turbidity Value</h4>
                    </div>
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-center">
                            <div class="circle-container">
                                <h1 class="dataTime circle-time">-</h1>
                                <h1 id="dataTurbidity" class="circle-value">0</h1>
                                <h1 class="circle-unit mb-0">NTU</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-black mb-0">Turbidity Chart</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="chartDataTurbidity"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let fetchDataInterval;
        let fetchDataStatus = false;
        let fetchChartPhInterval;
        let fetchChartTempInterval;
        let fetchChartTdsInterval;
        let fetchChartTurbidityInterval;

        function fetchLastDataSensor() {
            $.ajax({
                url: 'logs/data/fetch/last',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#cardStatusConnection').addClass('light-danger');
                    $('#textStatusConnection').text('Sensor Disconnected');
                    $('.dataTime').html(data['timestamp']);
                    $('#dataPh').html(data['ph']);
                    $('#dataTemp').html(data['temp']);
                    $('#dataTds').html(data['tds']);
                    $('#dataTurbidity').html(data['turbidity']);
                    $('#textStatusAir').text(data['status_air']);
                    if (data['status_air'] == 'Bersih') {
                        $('#cardStatusAir').addClass('light-success');
                    } else if (data['status_air'] == 'Tercemar Kecil') {
                        $('#cardStatusAir').addClass('light-warning');
                    } else if (data['status_air'] == 'Tercemar Sedang') {
                        $('#cardStatusAir').addClass('light-danger');
                    } else if (data['status_air'] == 'Tercemar Berat') {
                        $('#cardStatusAir').addClass('light-dark');
                    } else {
                        $('#cardStatusAir').addClass('light-primary');
                    }
                    $('#syncSensor').removeClass('d-none');
                },
                error: function (response) {
                    console.log('An error occurred during the AJAX request.');
                }
            });
        }

        fetchLastDataSensor();

        function fetchDataSensor() {
            if (!fetchDataStatus) {
                fetchDataStatus = true;
                $.ajax({
                    url: 'logs/data/fetch',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#cardStatusConnection').addClass('light-success');
                        $('#textStatusConnection').text('Sensor Connected');
                        $('.dataTime').html(data['timestamp']);
                        $('#dataPh').html(data['ph']);
                        $('#dataTemp').html(data['temp']);
                        $('#dataTds').html(data['tds']);
                        $('#dataTurbidity').html(data['turbidity']);
                        fetchDataStatus = false;
                        $('#syncSensor').addClass('d-none');
                    },
                    error: function (response) {
                        fetchLastDataSensor();
                        console.log('An error occurred during the AJAX request.');
                        clearInterval(fetchDataInterval);
                        clearInterval(fetchChartPhInterval);
                        clearInterval(fetchChartTempInterval);
                        clearInterval(fetchChartTdsInterval);
                        clearInterval(fetchChartTurbidityInterval);
                        fetchDataStatus = false;
                    }
                });
            }
        }

        fetchDataSensor();

        var optionsPh = {
            series: [{
                name: "Data pH",
                data: []
            }],
            chart: {
                id: 'realtime',
                height: 350,
                type: 'area',
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Dynamic Updating pH Data Chart',
                align: 'left'
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                labels: {
                    datetimeUTC: false
                },
                range: 10000,
            },
            legend: {
                show: false
            },
        };

        var chartPh = new ApexCharts(document.querySelector("#chartDataPh"), optionsPh);
        chartPh.render();

        function fetchDataChartPh() {
            $.ajax({
                url: 'chart-data-ph',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    chartPh.updateSeries([{
                        data: data
                    }]);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        fetchDataChartPh();

        var optionsTemp = {
            series: [{
                name: "Data pH",
                data: []
            }],
            chart: {
                id: 'realtime',
                height: 350,
                type: 'area',
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Dynamic Updating Temperature Data Chart',
                align: 'left'
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                labels: {
                    datetimeUTC: false
                },
                range: 10000,
            },
            legend: {
                show: false
            },
        };

        var chartTemp = new ApexCharts(document.querySelector("#chartDataTemp"), optionsTemp);
        chartTemp.render();

        function fetchDataChartTemp() {
            $.ajax({
                url: 'chart-data-temp',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    chartTemp.updateSeries([{
                        data: data
                    }]);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        fetchDataChartTemp();

        var optionsTds = {
            series: [{
                name: "Data pH",
                data: []
            }],
            chart: {
                id: 'realtime',
                height: 350,
                type: 'area',
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Dynamic Updating TDS Data Chart',
                align: 'left'
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                labels: {
                    datetimeUTC: false
                },
                range: 10000,
            },
            legend: {
                show: false
            },
        };

        var chartTds = new ApexCharts(document.querySelector("#chartDataTds"), optionsTds);
        chartTds.render();

        function fetchDataChartTds() {
            $.ajax({
                url: 'chart-data-tds',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    chartTds.updateSeries([{
                        data: data
                    }]);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        fetchDataChartTds();

        var optionsTurbidity = {
            series: [{
                name: "Data pH",
                data: []
            }],
            chart: {
                id: 'realtime',
                height: 350,
                type: 'area',
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Dynamic Updating Turbidity Data Chart',
                align: 'left'
            },
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                labels: {
                    datetimeUTC: false
                },
                range: 10000,
            },
            legend: {
                show: false
            },
        };

        var chartTurbidity = new ApexCharts(document.querySelector("#chartDataTurbidity"), optionsTurbidity);
        chartTurbidity.render();

        function fetchDataChartTurbidity() {
            $.ajax({
                url: 'chart-data-turbidity',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    chartTurbidity.updateSeries([{
                        data: data
                    }]);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        fetchDataChartTurbidity();

        $(document).ready(function () {
            fetchDataInterval = setInterval(fetchDataSensor, 1000);
            fetchChartPhInterval = setInterval(fetchDataChartPh, 1000);
            fetchChartTempInterval = setInterval(fetchDataChartTemp, 1000);
            fetchChartTdsInterval = setInterval(fetchDataChartTds, 1000);
            fetchChartTurbidityInterval = setInterval(fetchDataChartTurbidity, 1000);
        });
    </script>
@endpush

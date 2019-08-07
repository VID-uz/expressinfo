@extends('admin_user.layouts.app')

@section('contentDiv', true)

@section('content')

    <div class="content">
        <div class="row gutters-tiny invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block" style="height: 98%;">
                    <div class="block-header">
                        <h3 class="block-title">
                            Кликов <small>в неделю</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-wrench"></i>--}}
                                {{--</button>--}}
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs-dashboard-lines"></canvas>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">В месяц</div>
                                <div class="font-size-h4 font-w600">{{ $monthClicks }}</div>
                                {{--<div class="font-w600 text-success">--}}
                                    {{--<i class="fa fa-caret-up"></i> +16%--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">В неделю</div>
                                <div class="font-size-h4 font-w600">{{ $weekClicks }}</div>
                                {{--<div class="font-w600 text-danger">--}}
                                    {{--<i class="fa fa-caret-down"></i> -3%--}}
                                {{--</div>--}}
                            </div>
                            {{--<div class="col-12 col-sm-4 text-center text-sm-left">--}}
                                {{--<div class="font-size-sm font-w600 text-uppercase text-muted">Среднее</div>--}}
                                {{--<div class="font-size-h4 font-w600">24.3</div>--}}
                                    {{--<div class="font-w600 text-success">--}}
                                        {{--<i class="fa fa-caret-up"></i> +9%--}}
                                    {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Социальный статус</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Возраст</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Регион</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Пол</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Браузеры</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="block" style="height: 98%;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Операционные системы</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Pie Chart Container -->
                                <canvas class="js-chartjs-pie5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pie Chart -->
            </div>
        </div>
    </div>


@endsection

@section('js')
    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="/assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
    <script src="/assets/js/plugins/flot/jquery.flot.min.js"></script>
    <script src="/assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="/assets/js/plugins/flot/jquery.flot.stack.min.js"></script>
    <script src="/assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
    <script>
        /*
 *  Document   : be_pages_dahboard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Dashboard Page
 */

        var BePagesDashboard = function() {
            // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
            var initDashboardChartJS = function () {
                // Set Global Chart.js configuration
                Chart.defaults.global.defaultFontColor              = '#555555';
                Chart.defaults.scale.gridLines.color                = "transparent";
                Chart.defaults.scale.gridLines.zeroLineColor        = "transparent";
                Chart.defaults.scale.display                        = true;
                Chart.defaults.scale.ticks.beginAtZero              = true;
                Chart.defaults.global.elements.line.borderWidth     = 2;
                Chart.defaults.global.elements.point.radius         = 5;
                Chart.defaults.global.elements.point.hoverRadius    = 7;
                Chart.defaults.global.tooltips.cornerRadius         = 3;
                Chart.defaults.global.legend.display                = true;

                // Chart Containers
                var chartDashboardLinesCon  = jQuery('.js-chartjs-dashboard-lines');
                var chartPieCon    = jQuery('.js-chartjs-pie');
                
                var chartPolarPieDonutData = {
                    labels: [
                        @foreach($ages as $age => $value)
                        @if($age == 'from_16_to_24')
                            'С 16 до 24',
                        @elseif($age == 'from_24_to_32')
                            'С 24 до 32',
                        @elseif($age == 'from_32_to_45')
                            'С 45 до 60',
                        @elseif($age == 'from_45_to_60')
                            'С 45 до 60',
                        @elseif($age == '60+')
                            '60+',
                        @else
                        '{{ $age }}',
                        @endif
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($ages as $age => $value)
                            {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($ages as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($ages as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon.length ) {
                    chartPie   = new Chart(chartPieCon, { type: 'pie', data: chartPolarPieDonutData });
                }
                var chartPieCon2    = jQuery('.js-chartjs-pie2');
                
                var chartPolarPieDonutData2 = {
                    labels: [
                        @foreach($regions as $age => $value)
                        @if($age == 'Tashkent_ob')
                            'Ташкентская область',
                        @elseif($age == 'Tashkent')
                            'Ташкент',
                        @elseif($age == 'Karakalpakistan_res')
                            'Республика Каракалпакстан',
                        @elseif($age == 'Andijan_ob')
                            'Андижанская область',
                        @elseif($age == 'Buxara_ob')
                            'Бухаринская область',
                        @elseif($age == 'Djizak_ob')
                            'Джихзакская область',
                        @elseif($age == 'Kashkadarya_ob')
                            'Кашкадаринская область',
                        @elseif($age == 'Navoyi_ob')
                            'Навоийская область',
                        @elseif($age == 'Namangan_ob')
                            'Наманганская область',
                        @elseif($age == 'Samarkand_ob')
                            'Самаркандская область',
                        @elseif($age == 'Surxandarya_ob')
                            'Сурхандаринская область',
                        @elseif($age == 'Sirdarya_ob')
                            'Сирдаринская область',
                        @elseif($age == 'Xorezm_ob')
                            'Хорезмская область',
                        @else
                        '{{ $age }}',
                        @endif
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($regions as $age => $value)
                            {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($regions as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($regions as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon2.length ) {
                    chartPie2   = new Chart(chartPieCon2, { type: 'pie', data: chartPolarPieDonutData2 });
                }
                var chartPieCon3    = jQuery('.js-chartjs-pie3');
                
                var chartPolarPieDonutData3 = {
                    labels: [
                        @foreach($sex as $age => $value)
                        '{{ ($age == 'Male') ? 'Мужчины' : 'Женщины'  }}',
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($sex as $age => $value)
                                {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($sex as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($sex as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon3.length ) {
                    chartPie3   = new Chart(chartPieCon3, { type: 'pie', data: chartPolarPieDonutData3 });
                }
                var chartPieCon4    = jQuery('.js-chartjs-pie4');
                
                var chartPolarPieDonutData4 = {
                    labels: [
                        @foreach($browsers as $age => $value)
                            '{{ $age }}',
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($browsers as $age => $value)
                            {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($browsers as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($browsers as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon4.length ) {
                    chartPie4   = new Chart(chartPieCon4, { type: 'pie', data: chartPolarPieDonutData4 });
                }
                var chartPieCon5    = jQuery('.js-chartjs-pie5');
                
                var chartPolarPieDonutData5 = {
                    labels: [
                        @foreach($os as $age => $value)
                        '{{ $age }}',
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($os as $age => $value)
                            {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($os as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($os as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon5.length ) {
                    chartPie5   = new Chart(chartPieCon5, { type: 'pie', data: chartPolarPieDonutData5 });
                }
                var chartPieCon6    = jQuery('.js-chartjs-pie6');
                
                var chartPolarPieDonutData6 = {
                    labels: [
                        @foreach($status as $age => $value)
                            @if($age == 'pupil')
                                'Учащийся'
                            @endif
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($status as $age => $value)
                            {{ $value }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach($status as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach

                        ],
                        hoverBackgroundColor: [
                            @foreach($status as $age => $value)
                                'rgba({{ rand(0, 255) }},{{ rand(0, 255) }},{{ rand(0, 255) }},1)',
                            @endforeach
                        ]
                    }]
                };

                if ( chartPieCon6.length ) {
                    chartPie6   = new Chart(chartPieCon6, { type: 'pie', data: chartPolarPieDonutData6 });
                }


                // Chart Variables
                var chartDashboardLines;

                // Lines Charts Data
                var chartDashboardLinesData = {
                    labels: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
                    datasets: [
                        {
                            label: 'В эту неделю',
                            fill: true,
                            backgroundColor: 'rgba(66,165,245,.25)',
                            borderColor: 'rgba(66,165,245,1)',
                            pointBackgroundColor: 'rgba(66,165,245,1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(66,165,245,1)',
                            data: [
                            {{ $mondayClicks }}, 
                            {{ $tuesdayClicks }}, 
                            {{ $wednesdayClicks }}, 
                            {{ $thursdayClicks }}, 
                            {{ $fridayClicks }}, 
                            {{ $saturdayClicks }}, 
                            {{ $sundayClicks }}
                            ]
                        }
                    ]
                };

                var chartDashboardLinesOptions = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMax: 50
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItems, data) {
                                return ' ' + tooltipItems.yLabel + ' Кликов';
                            }
                        }
                    }
                };

                // Init Charts
                if ( chartDashboardLinesCon.length ) {
                    chartDashboardLines  = new Chart(chartDashboardLinesCon, { type: 'line', data: chartDashboardLinesData, options: chartDashboardLinesOptions });
                }
            };

            return {
                init: function () {
                    // Init Chart.js Charts
                    initDashboardChartJS();
                }
            };
        }();

        // Initialize when page loads
        jQuery(function(){ BePagesDashboard.init(); });
    </script>
@endsection
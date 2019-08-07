@extends('admin_user.layouts.app')

@section('contentDiv', true)

@section('content')

    <div class="content">
        <div class="row gutters-tiny invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
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
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Используемые операционные системы
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Используемые браузеры
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Возрасты
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <div id="chartContainer3" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Регионы
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <div id="chartContainer4" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Пол
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <div id="chartContainer5" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/canvasjs.js') }}"></script>
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
                Chart.defaults.scale.display                        = false;
                Chart.defaults.scale.ticks.beginAtZero              = true;
                Chart.defaults.global.elements.line.borderWidth     = 2;
                Chart.defaults.global.elements.point.radius         = 5;
                Chart.defaults.global.elements.point.hoverRadius    = 7;
                Chart.defaults.global.tooltips.cornerRadius         = 3;
                Chart.defaults.global.legend.display                = false;

                // Chart Containers
                var chartDashboardLinesCon  = jQuery('.js-chartjs-dashboard-lines');
                var chartDashboardLinesCon2 = jQuery('.js-chartjs-dashboard-lines2');

                // Chart Variables
                var chartDashboardLines, chartDashboardLines2;

                // Lines Charts Data
                var chartDashboardLinesData = {
                    labels: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
                    datasets: [
                        {
                            label: 'На этой неделе',
                            fill: true,
                            backgroundColor: 'rgba(66,165,245,.25)',
                            borderColor: 'rgba(66,165,245,1)',
                            pointBackgroundColor: 'rgba(66,165,245,1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(66,165,245,1)',
                            data: [{{ $mondayClicks }}, {{ $tuesdayClicks }}, {{ $wednesdayClicks }}, {{ $thursdayClicks }},{{ $fridayClicks }}, {{ $saturdayClicks }}, {{ $sundayClicks }}]
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

                var chartDashboardLinesData2 = {
                    labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                    datasets: [
                        {
                            label: 'This Week',
                            fill: true,
                            backgroundColor: 'rgba(156,204,101,.25)',
                            borderColor: 'rgba(156,204,101,1)',
                            pointBackgroundColor: 'rgba(156,204,101,1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(156,204,101,1)',
                            data: [190, 219, 235, 320, 360, 354, 390]
                        }
                    ]
                };

                var chartDashboardLinesOptions2 = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMax: 480
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItems, data) {
                                return ' $ ' + tooltipItems.yLabel;
                            }
                        }
                    }
                };

                // Init Charts
                if ( chartDashboardLinesCon.length ) {
                    chartDashboardLines  = new Chart(chartDashboardLinesCon, { type: 'line', data: chartDashboardLinesData, options: chartDashboardLinesOptions });
                }

                if ( chartDashboardLinesCon2.length ) {
                    chartDashboardLines2 = new Chart(chartDashboardLinesCon2, { type: 'line', data: chartDashboardLinesData2, options: chartDashboardLinesOptions2 });
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
        $(function () {
            $("#chartContainer").CanvasJSChart({
                title: {
                    // text: "Worldwide Smartphone sales by brand - 2012",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend :{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y} %",
                        dataPoints: [
                            @foreach($osPercentages as $percentage => $value)
                            { label: "{{ $percentage }}",  y: {{ $value }}, legendText: "{{ $percentage }}"},
                            @endforeach
                        ]
                    }
                ]
            });
            $("#chartContainer2").CanvasJSChart({
                title: {
                    // text: "Worldwide Smartphone sales by brand - 2012",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend :{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y} %",
                        dataPoints: [
                            @foreach($browserPercentages as $percentage => $value)
                            { label: "{{ $percentage }}",  y: {{ $value }}, legendText: "{{ $percentage }}"},
                            @endforeach
                        ]
                    }
                ]
            });
            
            $("#chartContainer3").CanvasJSChart({
                title: {
                    // text: "Worldwide Smartphone sales by brand - 2012",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend :{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y} %",
                        dataPoints: [
                            @foreach($ages as $percentage => $value)
                            { label: "{{ $percentage }}",  y: {{ $value['percent'] }}, legendText: "{{ $value['legend'] }}"},
                            @endforeach
                        ]
                    }
                ]
            });
            
            $("#chartContainer4").CanvasJSChart({
                title: {
                    // text: "Worldwide Smartphone sales by brand - 2012",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend :{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y} %",
                        dataPoints: [
                            @foreach($regions as $percentage => $value)
                            { label: "{{ $percentage }}",  y: {{ $value['percent'] }}, legendText: "{{ $value['legend'] }}"},
                            @endforeach
                        ]
                    }
                ]
            });
            
            $("#chartContainer5").CanvasJSChart({
                title: {
                    // text: "Worldwide Smartphone sales by brand - 2012",
                    fontSize: 24
                },
                axisY: {
                    title: "Products in %"
                },
                legend :{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y} %",
                        indexLabel: "{y} %",
                        dataPoints: [
                            @foreach($sex as $percentage => $value)
                            { label: "{{ $percentage }}",  y: {{ $value['percent'] }}, legendText: "{{ $value['legend'] }}"},
                            @endforeach
                        ]
                    }
                ]
            });
        })
    </script>
@endsection
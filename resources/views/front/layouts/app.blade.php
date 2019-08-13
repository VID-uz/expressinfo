<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}?ver=1">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}?ver=1">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/third_party.css') }}?ver=94">
<!-- <link rel="stylesheet" href="{{ asset('css/steps.css')}}"> -->
    <style>
        fadethis{
            display: none !important;
        }
        .wizard>.content{
            min-height: 300px !important;
            max-height: 300px !important;
            padding: 17px;
            overflow-y: scroll !important;
        }
        .wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active{
            background: #2184be;
            color: #fff;
            display: block;
            padding: .5em 1em;
            text-decoration: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        .wizard>.actions .disabled a, .wizard>.actions .disabled a:hover, .wizard>.actions .disabled a:active {
            background: #eee;
            color: #aaa;
        }
        .wizard>.actions ul{
            padding: 0;
            margin: 10px 0 0 0;

        }
        .wizard>.actions li{
            list-style: none;

        }
        .wizard>.content {
            background: #eee;
            display: block;
            margin: 0;
            margin-bottom: 5px;
            min-height: 35em;
            overflow: auto;
            position: relative;
            width: auto;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        .wizard .css-control{

            margin: 0 0 7px 0;

        }
        .contacts_popup_wrappper{

            display: flex;

            flex-wrap: wrap;

            justify-content: center;

            width: 100%;

            height: 100%;

            margin: 0;

            padding: 0;

        }

        .contacts_popup_inner{

            margin: auto;
        }
    </style>
    <!-- END Stylesheets -->
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(54773344, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/54773344" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <meta name="google-site-verification" content="GtV-aJ0pWrb9jGIRoJfHg0X6uL9K53BwD7UWklghfzg" />

</head>
<body>

<div class="contacts_popup_outer form_popup" style="display:none;position: fixed;top:0;right: 0;bottom: 0;left: 0;z-index: 20;height: auto;">
    <div class="contacts_popup_wrappper">
        <div class="contacts_popup_inner" style="width: 300px;">
            <form id="popup_form_second" action="#">
                <div class="block-content block-content2 block-content-sm" style="padding: 0;">
                    <div class="progress" data-wizard="progress" style="height: 8px;margin: 0 0 5px 0;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div id="wizard">
                    <h1 style="display: none;">Section1</h1>
                    <div>
                        <label class="css-control css-control-secondary css-radio">
                            Ваш соц. статус <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="1">
                            Учащийся <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="2">
                            Служащий гос учреждения <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="3">
                            Военнослужащий <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="4">
                            Безработный <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="5">
                            Пенсионер <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="6">
                            Домохозяйка <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="status" value="7">
                            Предприниматель <span class="css-control-indicator"></span>
                        </label>
                    </div>

                    <h1 style="display: none;">Section2</h1>
                    <div>
                        <label class="css-control css-control-secondary css-radio">
                            Возраст <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" required="" class="css-control-input required" name="age"  value="1">
                            от 16 до 24 <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="age" value="2">
                            от 24 до 32 <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="age" value="3">
                            от 32 до 45 <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="age" value="4">
                            от 45 до 60 <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="age" value="5">
                            60+ <span class="css-control-indicator"></span>
                        </label>
                    </div>

                    <h1 style="display: none;">Section2</h1>
                    <div>
                        <label class="css-control css-control-secondary css-radio">
                            Ваш пол <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" required="" class="css-control-input required" name="sex"  value="1">
                            Мужской <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="sex" value="2">
                            Женский <span class="css-control-indicator"></span>
                        </label>
                    </div>

                    <h1 style="display: none;">Section2</h1>
                    <div>
                        <label class="css-control css-control-secondary css-radio">
                            Ваш регион <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="1">
                            Ташкент <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="2">
                            Ташкентская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region"  value="3">
                            Андижанская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="4">
                            Бухарская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="5">
                            Джизакская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="6">
                            Кашкадарьинская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="7">
                            Навоийская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="8">
                            Наманганская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="9">
                            Самаркандская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="10">
                            Сурхандарьинская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="11">
                            Сырдарьинская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="12">
                            Ферганская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="13">
                            Хорезмская область <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-secondary css-radio">
                            <input type="radio" class="css-control-input" name="region" value="14">
                            Республика Каракалпакстан <span class="css-control-indicator"></span>
                        </label>
                    </div>
                </div>
                <input class="popup_form_submit" type="submit" style="display: none;">
            </form>
        </div>
    </div>
</div>
<div class="contacts_popup2" id="form_popup" style="display: none; z-index: 13;"></div>
@include('front.layouts.partials.header')

<!-- Main Container -->
<main class="main_container">

    @yield('content')

</main>
<!-- END Main Container -->

@include('front.layouts.partials.footer')

<!-- Codebase Core JS -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.scrollLock.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/codebase.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.steps.min.js')}}"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/lazyload.js"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/third_party.js') }}?ver=17"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/be_pages_dashboard.js') }}"></script>
<script>
    jQuery(function () {
        // Codebase.helpers('select2');
    });
    $(function () {
        $('.js-select2').select2();
    })

</script>
<script>
    {{--@if(Cookie::get('questionare') != null)--}}
        {{--window.onload = function() {--}}

            {{--$('.contacts_popup2').attr('style', 'display: block; z-index: 13;');--}}
            {{--$('.contacts_popup_outer').attr('style', 'display:block;position: fixed;top:0;right: 0;bottom: 0;left: 0;z-index: 20;height: auto;');--}}
            {{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}
            {{--$.ajax({--}}
                {{--type: 'POST',--}}
                {{--url: '/check_cookie',--}}
                {{--dataType: 'json',--}}
                {{--success: function(data){--}}
                    {{--if(data.questionare)--}}
                    {{--{--}}
                        {{--//$('.contacts_popup2').attr('style', 'display: none; z-index: 13;');--}}
                        {{--//$('.contacts_popup_outer').attr('style', 'display:none;position: fixed;top:0;right: 0;bottom: 0;left: 0;z-index: 20;height: auto;');--}}
                    {{--}else{--}}
                        {{--console.log('not exists');--}}
                        {{--$('.contacts_popup2').attr('style', 'display: block; z-index: 13;');--}}
                        {{--$('.contacts_popup_outer').attr('style', 'display:block;position: fixed;top:0;right: 0;bottom: 0;left: 0;z-index: 20;height: auto;');--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (data) {--}}
                    {{--console.log(data.response);--}}
                {{--}--}}
            {{--});--}}


        {{--};--}}
        {{--window.onunload = function(){};--}}
    {{--@endif--}}
    $(function(){
        var settings = {
            stepsContainerTag: 'fadeThis',
            labels: {
                cancel: "Отмена",
                finish: "Отправить",
                next: "Следующее",
                previous: "Предыдущее",
                loading: "Загрузка ..."
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                if($("input[name='status']:checked").val() != null)
                {
                    return true;
                }else if($("input[name='age']:checked").val() != null)
                {
                    return true;
                }else if($("input[name='sex']:checked").val() != null)
                {
                    return true;
                }else if($("input[name='region']:checked").val() != null)
                {
                    return true;
                }else{
                    return false;
                }
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                var all = $(".wizard>.content>.body").length;
                var n = (100 / all) * currentIndex;
                if (currentIndex == 0) {
                    $(".progress-bar").css("width", "0%");
                }else{
                    $(".progress-bar").css("width", ""+n+"%");
                }
            },
            onFinished: function (event, currentIndex) {
                $(".progress-bar").css("width", "100%");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append('age', $("input[name='age']:checked").val());
                formData.append('status', $("input[name='status']:checked").val());
                formData.append('sex', $("input[name='sex']:checked").val());
                formData.append('region', $("input[name='region']:checked").val());
                $.ajax({
                    type: 'POST',
                    url: '/save/data',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        if(data.success)
                        {
                            $('.contacts_popup2').remove();
                            $('.form_popup').remove();
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
                console.log('finished');
            },
        };
        $('#wizard').steps(settings);
        lazyload();
    })
</script>
@yield('js')
</body>
</html>
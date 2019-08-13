<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>ExpressInfo</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third_party.css') }}?ver=7">
</head>
<body>
<div class="contacts_popup" id="contacts_popup" style="display: none;">
    <div class="contacts_popup_outer">
        <div class="contacts_popup_inner">
            <h1 class="contacts_popup_inner_title">
                <i class="fa fa-phone fa-2x"></i>По вопросам размещения Web сайтов и рекламы:
            </h1>
            <a href="tel:+998953411717" class="contacts_popup_inner_link">
                <i class="fa fa-phone fa-2x"></i>+99895 341-17-17
            </a>
            <a href="tel:+998954781717" class="contacts_popup_inner_link">
                <i class="fa fa-phone fa-2x"></i>+99895 478-17-17
            </a>
            <a href="tel:+998954761717" class="contacts_popup_inner_link">
                <i class="fa fa-phone fa-2x"></i>+99895 476-17-17
            </a>
            <a href="tel:+998954791717" class="contacts_popup_inner_link">
                <i class="fa fa-phone fa-2x"></i>+99895 479-17-17
            </a>
        </div>
    </div>
</div>


@include('front.layouts.partials.header')

<div class="catalog_single_main_bg">
    <div class="container">
        <div class="row catalog_single_main">
            <div class="col-12 col-lg-7 catalog_single_main_inner" style="margin-bottom: auto;">
                {{--<div class="catalog_single_main_logo">--}}
                    {{--<img src="{{ $item->getImage() }}" alt="">--}}
                {{--</div>--}}
                <div class="catalog_single_main_info">
                    <h1 class="catalog_single_main_info_title">
                    {!! $item->ru_title !!}
                    <!--                             ООО «Orient Finans Bank»
<span>
    АКБ головной офис - г. ТАШКЕНТ
</span> -->
                    </h1>
                    <div class="catalog_single_main_info_list">
                        <a href="tel:{{ $item->phone_number }}" class="catalog_single_main_info_list_item">
                            <i class="fa fa-phone fa-2x"></i>{{ $item->phone_number }}
                        </a>
                        {{--<a href="{{ $item->url }}" class="catalog_single_main_info_list_item">--}}
                            {{--<i class="fa fa-link fa-2x"></i>{{ $item->url }}--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="catalog_single_sliders_outer">
                    <div id="sync1" class="catalog_single_main_slider_main owl-carousel owl-theme">
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                        <a href="/img/ad-logo.jpg"  data-fancybox="catalog_single_slider_item" data-caption="" class="catalog_single_main_slider_main_item">
                            <img src="/img/ad-logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="catalog_single_main_slider_nav_outer">
                        <button class="catalog_single_main_slider_btn catalog_single_main_slider_btn_left">
                            <svg viewBox="0 0 15 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 13L15 0.00961876L15 25.9904L0 13Z" fill="#C4C4C4"/>
                            </svg>
                        </button>
                        <div id="sync2" class="catalog_single_main_slider_nav owl-carousel owl-theme">
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                            <div class="catalog_single_main_slider_nav_item">
                                <img src="/img/ad-logo.jpg" alt="">
                            </div>
                        </div>
                        <button class="catalog_single_main_slider_btn catalog_single_main_slider_btn_right">
                            <svg viewBox="0 0 15 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 13L15 0.00961876L15 25.9904L0 13Z" fill="#C4C4C4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="catalog_single_description">
                    {!! $item->ru_description !!}
                </div>
            </div>
            @if($item->geo_location != '')
                <div class="col-12 col-lg-5">
                    <div class="catalog_single_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.8730065499294!2d69.27485551572538!3d41.31162620865066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b2f4960f131%3A0xe7d3ad898ef8844c!2z0JzQuNC90LjRgdGC0LXRgNGB0YLQstC-INGO0YHRgtC40YbQuNC4!5e0!3m2!1sru!2s!4v1564647243309!5m2!1sru!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            @endif
        </div>
        <div class="row catalog_single_section">
            <div class="col-12 col-lg-7">
                <!-- <h1 class="catalog_single_section_title">
                    Услуги:
                </h1>
                <div class="catalog_single_services_list">
                    <div class="catalog_single_services_list_item">
                        <h1 class="catalog_single_services_list_item_title">
                            Для физических лиц
                        </h1>
                        <p class="catalog_single_services_list_item_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec ullamcorper sit amet risus nullam eget felis eget. Netus et malesuada fames ac turpis egestas sed tempus urna. Gravida cum sociis natoque penatibus.-
                        </p>
                    </div>
                    <div class="catalog_single_services_list_item">
                        <h1 class="catalog_single_services_list_item_title">
                            Для физических лиц
                        </h1>
                        <p class="catalog_single_services_list_item_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec ullamcorper sit amet risus nullam eget felis eget. Netus et malesuada fames ac turpis egestas sed tempus urna. Gravida cum sociis natoque penatibus.-
                        </p>
                    </div>
                    <div class="catalog_single_services_list_item">
                        <h1 class="catalog_single_services_list_item_title">
                            Для физических лиц
                        </h1>
                        <p class="catalog_single_services_list_item_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec ullamcorper sit amet risus nullam eget felis eget. Netus et malesuada fames ac turpis egestas sed tempus urna. Gravida cum sociis natoque penatibus.-
                        </p>
                    </div>
                    <div class="catalog_single_services_list_item">
                        <h1 class="catalog_single_services_list_item_title">
                            Для физических лиц
                        </h1>
                        <p class="catalog_single_services_list_item_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec ullamcorper sit amet risus nullam eget felis eget. Netus et malesuada fames ac turpis egestas sed tempus urna. Gravida cum sociis natoque penatibus.-
                        </p>
                    </div>
                </div>
                                </div> -->
                <!-- <div class="col-12 col-lg-5">
                    <h1 class="catalog_single_section_title catalog_single_location_title">
                        Филиалы:
                    </h1>
                    <div class="catalog_single_location_list">
                        <div class="catalog_single_location_list_item">
                            <div class="catalog_single_location_list_item_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.8730065499294!2d69.27485551572538!3d41.31162620865066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b2f4960f131%3A0xe7d3ad898ef8844c!2z0JzQuNC90LjRgdGC0LXRgNGB0YLQstC-INGO0YHRgtC40YbQuNC4!5e0!3m2!1sru!2s!4v1564647243309!5m2!1sru!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <h1 class="catalog_single_location_list_item_title">
                                7А Yakkachinor ko'chasi, Тошкент 100029, Узбекистан
                            </h1>
                        </div>
                        <div class="catalog_single_location_list_item">
                            <div class="catalog_single_location_list_item_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.8730065499294!2d69.27485551572538!3d41.31162620865066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b2f4960f131%3A0xe7d3ad898ef8844c!2z0JzQuNC90LjRgdGC0LXRgNGB0YLQstC-INGO0YHRgtC40YbQuNC4!5e0!3m2!1sru!2s!4v1564647243309!5m2!1sru!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <h1 class="catalog_single_location_list_item_title">
                                7А Yakkachinor ko'chasi, Тошкент 100029, Узбекистан
                            </h1>
                        </div>
                        <div class="catalog_single_location_list_item">
                            <div class="catalog_single_location_list_item_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.8730065499294!2d69.27485551572538!3d41.31162620865066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b2f4960f131%3A0xe7d3ad898ef8844c!2z0JzQuNC90LjRgdGC0LXRgNGB0YLQstC-INGO0YHRgtC40YbQuNC4!5e0!3m2!1sru!2s!4v1564647243309!5m2!1sru!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <h1 class="catalog_single_location_list_item_title">
                                7А Yakkachinor ko'chasi, Тошкент 100029, Узбекистан
                            </h1>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    @include('front.layouts.partials.footer')

    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/third_party.js') }}?ver=7"></script>

    <script>
        $(document).ready(function() {




            var sync1 = $("#sync1");
            var sync2 = $("#sync2");

            var thumbnailItemClass = '.owl-item';

            var slides = sync1.owlCarousel({
                video:true,
                startPosition: 12,
                items:1,
                loop:false,
                margin:10,
                autoplay:false,
                autoplayTimeout:6000,
                autoplayHoverPause:false,
                nav: false,
                dots: false
            }).on('changed.owl.carousel', syncPosition);

            function syncPosition(el) {
                $owl_slider = $(this).data('owl.carousel');
                var loop = $owl_slider.options.loop;

                if(loop){
                    var count = el.item.count-1;
                    var current = Math.round(el.item.index - (el.item.count/2) - .5);
                    if(current < 0) {
                        current = count;
                    }
                    if(current > count) {
                        current = 0;
                    }
                }else{
                    var current = el.item.index;
                }

                var owl_thumbnail = sync2.data('owl.carousel');
                var itemClass = "." + owl_thumbnail.options.itemClass;


                var thumbnailCurrentItem = sync2
                    .find(itemClass)
                    .removeClass("synced")
                    .eq(current);

                thumbnailCurrentItem.addClass('synced');

                if (!thumbnailCurrentItem.hasClass('active')) {
                    var duration = 500;
                    sync2.trigger('to.owl.carousel',[current, duration, true]);
                }
            }
            var thumbs = sync2.owlCarousel({
                startPosition: 12,
                items:5,
                loop:false,
                margin:10,
                autoplay:false,
                nav: false,
                dots: false,
                responsive:{
                    0: {
                        items:2,
                    },
                    200: {
                        items:3,
                    },
                    400: {
                        items:5,
                    },
                },
                onInitialized: function (e) {
                    var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
                    thumbnailCurrentItem.addClass('synced');
                },
            })
                .on('click', thumbnailItemClass, function(e) {
                    e.preventDefault();
                    var duration = 500;
                    var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
                    sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
                })
            // .on("changed.owl.carousel", function (el) {
            //   var number = el.item.index;
            //   $owl_slider = sync1.data('owl.carousel');
            //   $owl_slider.to(number, 100, true);
            // });
            $('.catalog_single_main_slider_btn_right').click(function() {
                sync1.trigger('next.owl.carousel',500);
            });
            $('.catalog_single_main_slider_btn_left').click(function() {
                sync1.trigger('prev.owl.carousel',500);
            });

        });
    </script>
</body>
</html>
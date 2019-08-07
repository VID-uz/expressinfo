@extends('front.layouts.app')

@section('content')
    <style>
        .main_item_img{
            width: 100%;
            overflow: hidden;
            padding-top: 21px;
            padding-bottom: 5px;
            overflow: hidden;
        }
        .main_item_img img{
            object-fit: cover;
            height: 100%;
            max-height: 200px;
            width: 130px !important;
            height: 130px !important;
        }
        .main_item{
            
            display: flex;
            flex-flow: column;
        }
        .main_item_p{
            color: #00C3CE;
            font-family: "OpenSans-Semibold";
            font-size: 12px;
            text-transform: uppercase;
        }
    </style>
    
    <div class="container">
        <div class="block-content categories_breadcrump m-0 py-10">

            <a href="\" onclick="history.back();return false;" class="categories_back_btn">Назад</a>
            <!-- <a href="http://express.vid.uz/categories" class="categories_back_btn">Назад</a> -->

        </div>
        <div class="main my-20">
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/БАНЕРНЫЕ СТОЙКИ.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/БАНЕРНЫЕ СТОЙКИ.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/ИНФО СТЕНД.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/ИНФО СТЕНД.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/Планшет, Флайер и Визитки.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/Планшет, Флайер и Визитки.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/СТОЙКИ.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/СТОЙКИ.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/ТВ РОЛИКИ.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/ТВ РОЛИКИ.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-32.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-32.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-36.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-36.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-39.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-39.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-42.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-42.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-46.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-46.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-07-31_18-43-49.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-07-31_18-43-49.jpg" style="width: 100%;" alt="">
                </a>
            </div>
             <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_121646_209.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_121646_209.jpg" style="width: 100%;" alt="">
                </a>
            </div>
             <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_121651_660.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_121651_660.jpg" style="width: 100%;" alt="">
                </a>
            </div>
             <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_121653_204.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_121653_204.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_121655_236.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_121655_236.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_190618_768.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_190618_768.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_190620_895.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_190620_895.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_190623_812.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_190623_812.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_190625_657.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_190625_657.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/IMG_20190801_190628_051.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/IMG_20190801_190628_051.jpg" style="width: 100%;" alt="">
                </a>
            </div>
        </div>
    </div>

@endsection
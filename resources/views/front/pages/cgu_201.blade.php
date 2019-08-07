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
                <a href="/img/60e751dc472f33e3af5f35273b64857d-0.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-0.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-1.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-1.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-2.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-2.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-3.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-3.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-4.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-4.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-5.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-5.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-6.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-6.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/60e751dc472f33e3af5f35273b64857d-7.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/60e751dc472f33e3af5f35273b64857d-7.jpg" style="width: 100%;" alt="">
                </a>
            </div>
        </div>
    </div>

@endsection
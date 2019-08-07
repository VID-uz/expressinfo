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
                <a href="/img/photo_2019-02-26_16-19-24.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-02-26_16-19-24.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/photo_2019-02-26_16-19-27.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/photo_2019-02-26_16-19-27.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/Олмазор Центр.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/Олмазор Центр.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/Чилонзор Центр.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/Чилонзор Центр.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/Яшнобод Центр.jpg" data-fancybox="cgu_ad_item" data-caption="" class="main_item_img">
                    <img src="/img/Яшнобод Центр.jpg" style="width: 100%;" alt="">
                </a>
            </div>
        </div>
    </div>

@endsection
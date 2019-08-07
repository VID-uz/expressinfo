
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
        <div class="main">
            <a href="{{ route('home.cgu_info_inner') }}" class="main_item" style="background-color: transparent;box-shadow: none;">
                <div class="main_item_icon">
                    <img src="/img/papka.png" alt="">
                </div>
                <div class="main_item_info">
                    <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                        Виды Размещения <br> Реклам в ЦГУ
                    </h1>
                </div>
            </a>
            <a href="{{ route('home.cgu.centers') }}" class="main_item" style="background-color: transparent;box-shadow: none;">
                <div class="main_item_icon">
                    <img src="/img/papka.png" alt="">
                </div>
                <div class="main_item_info">
                    <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                        ЦЕНТРЫ <br> ГОС УСЛУГ Ташкента
                    </h1>
                </div>
            </a>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/ad1.jpg" data-fancybox="cgu_ads_main" data-caption="" class="main_item_img">
                    <img src="/img/ad1.jpg" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                <a href="/img/ad2.jpg" data-fancybox="cgu_ads_main" data-caption="" class="main_item_img">
                    <img src="/img/ad2.jpg" style="width: 100%;" alt="">
                </a>
            </div>
        </div>
    </div>



@endsection
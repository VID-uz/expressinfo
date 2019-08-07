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
			    <a href="{{ route('home.diagram_cgu_info_inner') }}" class="main_item" style="background-color: transparent;box-shadow: none;">
                    <div class="main_item_icon">
                        <img src="/img/papka.png" alt="">
                    </div>
                    <div class="main_item_info">
                        <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                        	Диаграмма получения Гос. Услуг <br> в ЦГУ
                        </h1>
                    </div>
			    </a>
                <a href="{{ route('home.cgu_info.buildings') }}" class="main_item" style="background-color: transparent;box-shadow: none;">
                    <div class="main_item_icon">
                        <img src="/img/papka.png" alt="">
                    </div>
                    <div class="main_item_info">
                        <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                            Новые здания цгу <br>г. Ташкента
                        </h1>
                    </div>
                </a>
			    <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                    <a href="/img/Screenshot_2.png" data-fancybox="images" data-caption="" class="main_item_img">
                        <img src="/img/Screenshot_2.png" style="width: 100%;" alt="" style="width: 100%;">
                    </a>
                    <p class="main_item_p">Центры гос. услуг <br> г. Ташкента</p>
				</div>
			    <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                    <a href="/img/plakat.jpg" data-fancybox="images" data-caption="" class="main_item_img">
                        <img src="/img/plakat.jpg" style="width: 100%;" alt="" style="width: 100%;">
                    </a>
                    <p class="main_item_p">Информационный <br> плакат</p>
				</div>
			    <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                    <a href="/img/gos_uslugi.jpg" data-fancybox="images" data-caption="" class="main_item_img">
                        <img src="/img/gos_uslugi.jpg" style="width: 100%;" alt="" style="width: 100%;">
                    </a>
                    <p class="main_item_p">получение водительских прав <br> в центрах гос. услуг</p>
				</div>
                <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                    <video preload="metadata" controls style="width: 100%;" alt="" style="width: 100%;">
                      <source src="/video/VID_20190802_120113_571.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                    <video preload="metadata" controls style="width: 100%;" alt="" style="width: 100%;">
                      <source src="/video/VID_20190802_120115_184.mp4" type="video/mp4">
                    </video>
                </div>
        </div>
    </div>



@endsection
@extends('front.layouts.layout')

@section('content')

    <div class="header_bg">
        <div class="content">
            <div class="row">
                <div class="col-12 text-right d-flex align-items-center justify-content-end">
                    <div class="hidden_back" style="display: none;"></div>
                    <ul class="nav header_nav">
                        <button class="mob_nav_close"></button>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">Главная</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">Размещение в ExpressInfo</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.categories') }}"><h5 class="font-w600 m-0">Справочник</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">Разработчикам</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">Ответы на вопросы</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">О нас</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h5 class="font-w600 m-0">Контакты</h5></a>
                        </li>
                    </ul>
                    <div class="mob_menu_button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success px-30 header_btn ml-20">Авторизация</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main_bg" style="background-image: url('assets/img/various/full_height.jpg');">
        <div class="content p-0">
            <dic class="row index_inner d-flex align-items-center p-50">
                <div class="col-lg-7">
                    <h1 class="main_inner_title text-white display-4 font-w400 mb-50">
                        Вводный заголовок преимущество
                        + призыв к действию
                    </h1>
                    <h5 class="main_inner_text text-white">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.
                    </h5>
                </div>
                <div class="col-lg-5 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-square btn-hero btn-primary px-50 py-20 min-width-125">
                        РАЗМЕСТИТЬ РЕКЛАМУ
                    </button>
                </div>
            </dic>
        </div>
    </div>
    <!-- END Page Container -->

@endsection


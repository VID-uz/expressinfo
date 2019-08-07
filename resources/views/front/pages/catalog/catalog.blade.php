@extends('front.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('front.pages.catalog.partials.form')
            <div class="block-content categories_breadcrump">

            <a href="#" onclick="window.history.back();return false;" class="categories_back_btn">Назад</a>
                <!-- <a href="{{ redirect()->back()->getTargetUrl() }}" class="categories_back_btn">Назад</a> -->

                <nav class="breadcrumb push mb-0">

                    <a class="breadcrumb-item" href="/categories">Главная</a>

                    <span class="breadcrumb-item active">{{ strip_tags($category->ru_title) }}</span>

                    <!-- <a class="breadcrumb-item" href="{{ route('home.catalog.second', $category->id) }}">Вариант 2</a> -->

                </nav>

            </div>
            <!-- <div class="categories_outer categories_swipeable"> -->
            {{ $cat->links('vendor.pagination.pagination') }}
            <div class="categories_outer">
                <div class="categories">
                    @foreach($catalogs['active'] as $catalog)
                    <div class="categories_item @if(!$catalog->active) disabled @endif">
                        <div class="categories_item_inner">
                            <div class="categories_item_icon">
                                @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
                                @endif
                                <img src="{{ $catalog->getImage() }}" alt="">
                                @if($catalog->url != '' || $catalog->url != null)
                                <!-- </a> -->
                                @endif
                            </div>
                            <div class="categories_item_info">
                                @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                    <!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
                                @endif
                                    <h1 class="categories_item_title d-sm-none d-none d-lg-block d-md-block">
                                        <?php $exploded = explode(' ', strtolower($catalog->ru_title)); ?>
                                        <?php foreach ($exploded as $key) {
                                            $exploded2[] = ucfirst($key);
                                        } ?>
                                        {{ $catalog->ru_title }}
                                    </h1>
                                @if($catalog->url != '' || $catalog->url != null)
                                    <!-- </a> -->
                                @endif
                            </div>
                        </div>
                        <fieldset class="popover">
                            @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}" class="categories_popover_link">
                                    <i class="fa fa-link"></i>Перейти на сайт
                            @else
                                <a href="#" class="categories_popover_link">
                                    <i class="fa fa-link"></i>Нет ссылки
                            @endif
                            </a>
                            <hr>
                            @if($catalog->phone_number != '' && $catalog->active)
                            <a href="tel: {{ $catalog->phone_number }}" class="categories_popover_link">
                                <i class="fa fa-phone"></i>{{ $catalog->phone_number }}
                            @else
                            <a href="javascript::void(0)" class="categories_popover_link">
                                <i class="fa fa-phone"></i>Нет номера
                            @endif
                            </a>
                            @if($catalog->url != '' && $catalog->active)
                                <hr>
                                <a href="javascript::void(0)" class="categories_popover_link">
                                    <i class="fa fa-eye"></i> Просмотры: {{ $catalog->getClickCount() }}
                                </a>
                            @endif
<!--                             <hr>
                            <a href="{{ route('home.catalog.single', $catalog->id) }}" class="categories_popover_link categories_popover_link_btn">
                                Подробно
                            </a> -->
                        </fieldset>
                    </div>
                    @endforeach
                    @foreach($catalogs['not'] as $catalog)
                    <div class="categories_item @if(!$catalog->active) disabled @endif">
                        <div class="categories_item_inner">
                            <div class="categories_item_icon">
                                @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
                                @endif
                                <img src="{{ $catalog->getImage() }}" alt="">
                                @if($catalog->url != '' || $catalog->url != null)
                                <!-- </a> -->
                                @endif
                            </div>
                            <div class="categories_item_info">
                                @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                    <!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
                                @endif
                                    <h1 class="categories_item_title d-sm-none d-none d-lg-block d-md-block">{{ $catalog->ru_title }}</h1>
                                @if($catalog->url != '' || $catalog->url != null)
                                    <!-- </a> -->
                                @endif
                            </div>
                        </div>
                        <fieldset class="popover">
                            @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}" class="categories_popover_link">
                                    <i class="fa fa-link"></i>Перейти на сайт
                            @else
                                <a href="#" class="categories_popover_link">
                                    <i class="fa fa-link"></i>Нет ссылки
                            @endif
                            </a>
                            <hr>
                            @if($catalog->phone_number != '' && $catalog->active)
                            <a href="tel: {{ $catalog->phone_number }}" class="categories_popover_link">
                                <i class="fa fa-phone"></i>{{ $catalog->phone_number }}
                            @else
                            <a href="#" class="categories_popover_link">
                                <i class="fa fa-phone"></i>Нет номера
                            @endif
                            </a>
                            @if($catalog->url != '' && $catalog->active)
                                <hr>
                                <a href="javascript::void(0)" class="categories_popover_link">
                                    <i class="fa fa-eye"></i> Просмотры: {{ $catalog->getClickCount() }}
                                </a>
                            @endif
<!--                             <hr>
                            <a href="{{ route('home.catalog.single', $catalog->id) }}" class="categories_popover_link categories_popover_link_btn">
                                Подробно
                            </a> -->
                        </fieldset>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $cat->links('vendor.pagination.pagination') }}
        </div>
    </div>
@endsection
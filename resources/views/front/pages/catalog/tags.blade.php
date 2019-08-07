@extends('front.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="block-content categories_breadcrump">

{{--                <a href="#" onclick="window.history.back();return false;" class="categories_back_btn">Назад</a>--}}

                <nav class="breadcrumb push mb-0">

                    <a class="breadcrumb-item" href="/">Главная</a>
                    @if($category->hasChildren())
                        <a href="{{ route('home.category', $category->id) }}" class="breadcrumb-item">{{ $category->ru_title }}</a>
                    @else
                        <a href="{{ route('home.categories') }}" class="breadcrumb-item">{{ $category->ru_title }}</a>
                    @endif

                    <span class="breadcrumb-item active">{{ $tag->ru_title }}</span>

                </nav>

            </div>
            @include('front.pages.catalog.partials.form', ['tags' => true])
            <div class="main">
                @foreach($result as $catalog)
                    <div class="categories_item">
                        <div class="categories_item_icon">
                            @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}">
                                    @endif
                                    <img src="{{ $catalog->getImage() }}" alt="">
                                    @if($catalog->url != '' || $catalog->url != null)
                                </a>
                            @endif
                        </div>
                        <div class="categories_item_info">
                            @if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
                                <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}">
                                    @endif
                                    <h1 class="categories_item_title">{{ $catalog->ru_title }}</h1>
                                    @if($catalog->url != '' || $catalog->url != null)
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
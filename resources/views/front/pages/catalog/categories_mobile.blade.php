@extends('front.layouts.app')

@section('content')
@section('title'){{ strip_tags($category->ru_title) }} Узбекистана, Ташкента
@endsection
<div class="container">
    <div class="row">
        @include('front.pages.catalog.partials.form')
        <div class="main">

            @foreach($categories as $category)
                @if($category->hasChildren())
                    <a href="{{ route('home.category', $category->id) }}" class="main_item" style="background-color: {{ $category->color }};">
                        @else
                            <a href="{{ route('home.catalog', $category->id) }}" class="main_item" style="background-color: {{ $category->color }};">
                                @endif
                                <div class="main_item_icon">
                                    <img src="{{ $category->getImage() }}" alt="">
                                </div>
                                <div class="main_item_info">
                                    @if($category->hasChildren())
                                        <h1 class="main_item_title">{!! $category->ru_title !!}
                                            {{--.<span class="main_item_count">({{ count($category->children) }})</span>--}}
                                        </h1>
                                    @else
                                        <h1 class="main_item_title">{!! $category->ru_title !!}
                                            {{--.<span class="main_item_count">({{ count($category->catalogs()->get()->toArray()) }})</span>--}}
                                        </h1>
                                    @endif
                                </div>
                            </a>
                    @endforeach
        </div>
    </div>
</div>

@endsection
@extends('front.layouts.app')

@section('title')
    Справочник Узбекистана | Справочник предприятий Узбекистана | справочник организаций
@endsection

@section('content')

    <div class="uk-container">
    	<div class="uk-grid uk-grid-medium uk-child-width-1-1">
    		<div>
        		@include('front.pages.catalog.partials.form')
    		</div>
        </div>
        <div class="uk-grid uk-grid-medium uk-child-width-1-1">
        	<div uk-slider="" class="uk-slider uk-slider-container" finite="1">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                    <ul class="test uk-slider-items" style="transform: translate3d(-400px, 0px, 0px);">
                    	@foreach($categories as $category)
                        <li tabindex="-1" class="main_slider_item_wrapper" style="order: 1;">
                        	@if($category->hasChildren())
			                <a href="{{ route('home.category', $category->id) }}" class="main_slider_item">
				            @else
			                <a href="{{ route('home.catalog', $category->id) }}" class="main_slider_item">
				            @endif
                            	<div class="main_slider_item_icon">
                            		<img src="{{ $category->getImage() }}" alt="{!! $category->ru_title !!}">
                            	</div>
                            	<div class="main_slider_item_info">
                            		<h1 class="main_slider_item_title">
                            			{!! $category->ru_title !!}
                            		</h1>
                            	</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@l">

            @foreach($categories as $category)
            @if($category->hasChildren())
                <a href="{{ route('home.category', $category->id) }}" class="main_item">
            @else
                <a href="{{ route('home.catalog', $category->id) }}" class="main_item">
            @endif
            		<div class="main_item_inner">
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
	                        <p class="main_item_text">
	                        	Банки, Биржи, Страхование,
								Кредит, Брокеры, Инвест……
								<span uk-icon="chevron-right"></span>
	                        </p>
	                    </div>
            		</div>
                </a>

            @endforeach
        </div>
    </div>

@endsection
@section('js')
    <script>

        // $('body').attr('style', 'opacity: 0;');
        // window.location.href = 'http://express.vid.uz/mobile';
        // $(function(){
        //     if( document.documentElement.clientWidth < 576)
        //     {
        //         window.location.href = 'http://express.vid.uz/mobile';
        //     }else{

        //         $('body').removeAttr('style');
        //     }
        // });

    </script>
@endsection
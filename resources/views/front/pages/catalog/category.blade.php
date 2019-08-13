@extends('front.layouts.app')


@section('title')
	{{ strip_tags($category->ru_title) }} Узбекистана, Ташкента
@endsection

@section('content')
	<div class="container">
		<div class="row">
			@include('front.pages.catalog.partials.form')
			<div class="block-content categories_breadcrump">

				<a href="#" onclick="window.history.back();return false;" class="categories_back_btn">Назад</a>
			<!-- <a href="{{ redirect()->back()->getTargetUrl() }}" class="categories_back_btn">Назад</a> -->

				<nav class="breadcrumb push mb-0">

					<a class="breadcrumb-item" href="/">Главная</a>

					<span class="breadcrumb-item active">{{ strip_tags($category->ru_title) }}</span>

				<!-- <a class="breadcrumb-item" href="{{ route('home.catalog.second', $category->id) }}">Вариант 2</a> -->

				</nav>

			</div>
			<div class="main">
				@foreach($category->children as $category)
					<div class="category_second_level">
						<div class="main_item_info">
							@if($category->hasChildren())
								<h1 class="main_item_title">{{ $category->ru_title }}
									<span class="category_second_level_info_btn">Все</span>
								</h1>
							@else
								<h1 class="main_item_title">{{ $category->ru_title }}
									<span class="category_second_level_info_btn">Все</span>
								</h1>
							@endif
						</div>
					</div>
					@if($category->hasCatalogs())
						<div class="categories_outer categories_swipeable">
							<div class="categories">
						@foreach($category->catalogs as $catalog)
							@if($catalog->image != null)
								<a href="{{ (($catalog->url != '' || $catalog->url != null) && $catalog->active) ? route('home.redirect', ['id' => $catalog->id]) : '#' }}" class="categories_item @if(!$catalog->active) disabled @endif">
							@else
								<a href="{{ route('home.catalog.single', $catalog->id) }}" class="categories_item @if(!$catalog->active) disabled @endif">
							@endif

							<div class="categories_item_inner">
								@if($catalog->image != null)
									<div class="categories_item_icon">
										@if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
										<!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
										@endif
										<img src="{{ $catalog->getImage() }}" alt="">
										@if($catalog->url != '' || $catalog->url != null)
											<!-- </a> -->
										@endif
									</div>
								@endif
								<div class="categories_item_info" @if($catalog->image == null) style="display: block !important;" @endif>
								@if(($catalog->url != '' || $catalog->url != null) && $catalog->active)
								<!-- <a href="{{ route('home.redirect', ['id' => $catalog->id]) }}"> -->
								@endif
								<h1 class="categories_item_title d-sm-none d-none d-lg-block d-md-block">
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
								<a href="#" class="categories_popover_link">
									<i class="fa fa-phone"></i>Нет номера
							@endif
								</a>
								<hr>
								<a href="#" class="categories_popover_link">
									<i class="fa fa-eye"></i> Просмотры: {{ $catalog->getClickCount() }}
								</a>
												<!--                                     <hr>
							<a href="{{ route('home.catalog.single', $catalog->id) }}" class="categories_popover_link categories_popover_link_btn">
								Подробно
							</a> -->
						</fieldset>
					</a>
				@endforeach
			</div>
		</div>
		@endif
	@endforeach
			</div>
		</div>
	</div>
@endsection
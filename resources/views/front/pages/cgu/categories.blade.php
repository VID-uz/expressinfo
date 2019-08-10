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

            <a href="#" onclick="window.history.go(-1);return false;" class="categories_back_btn">Назад</a>
            <!-- <a href="http://express.vid.uz/categories" class="categories_back_btn">Назад</a> -->

        </div>
        <div class="main">
            @if($category->hasChildren())
                @foreach($category->children as $category_list)
                    @if($category_list->id != 39)
                        <a href="{{ route('home.cgu.info.category', $category_list->id) }}" class="main_item" style="background-color: transparent;box-shadow: none;">
                            <div class="main_item_icon">
                                <img src="/img/papka.png" alt="">
                            </div>
                            <div class="main_item_info">
                                <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                                    {!! $category_list->ru_title !!}
                                </h1>
                            </div>
                        </a>
                    @endif
                @endforeach
            @endif
            @if($category->hasSites())
                @foreach($category->sites as $catalog)
                    <a @if($catalog->video != '') href="{{ $catalog->video }}" @endif class="categories_item">
                        <div class="categories_item_inner">
                            <div class="categories_item_icon">
                                <img src="{{ $catalog->getImage() }}" alt="">
                            </div>
                            <div class="categories_item_info">
                                <h1 class="categories_item_title d-sm-none d-none d-lg-block d-md-block">
                                    {!! $catalog->ru_title !!}
                                </h1>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
            @if($category->hasFiles())
                @foreach($category->files as $file)
                    <div class="main_item" style="background-color: transparent;box-shadow: none;display: flex;padding: 0;">
                        @if($file->video == '')
                            @if($file->getFileType() == 'image')
                                <a href="{{ $file->getUrl() }}" data-fancybox="images" data-caption="" class="main_item_img">
                                    <img src="{{ $file->getUrl() }}" style="width: 100%;" alt="" style="width: 100%;">
                                </a>
                                <p class="main_item_p">{{ $file->ru_title }}</p>
                            @elseif($file->getFileType() == 'video')
                                <video preload="metadata" controls style="width: 100%;" alt="" style="width: 100%;">
                                    <source src="{{ $file->getUrl() }}" type="video/mp4">
                                </video>
                            @elseif($file->getFileType() == 'application')
                            <a href="{{ $file->getUrl() }}" target="_blank">
                                <div class="main_item_icon">
                                    <img src="/img/pdf-icon.png" alt="">
                                </div>
                                <div class="main_item_info">
                                    <h1 class="main_item_title" style="color: #00C3CE;font-size:12px;">
                                        {!! $file->ru_title !!}
                                    </h1>
                                </div>
                            </a>    
                            @endif
                        @else
                            <iframe style="width: 100%;" id="ytplayer" type="text/html"
                                    src="http://www.youtube.com/embed/{{ $file->video }}?autoplay=0"
                                    frameborder="0" allowfullscreen="1"></iframe>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>



@endsection
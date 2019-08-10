@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/select2.css">
    <style>
        .show-password{
            cursor: pointer;
        }
        .save_button{
            position: absolute;
            top: 85%;
            right: 3%;
        }
        .input_file{
            border: 1px solid #26c6da;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            position: relative;
            color: #26c6da;
        }
        .input_file__text{
            overflow: hidden;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 3px;
            padding-bottom: 3px;
            z-index: 1;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 15px;
        }
        .input_file__input{
            position: absolute;
            opacity: 0;
            z-index: 2;
        }
        .remove{
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 7%;
            text-align: right;
            padding-right: 10px;
            padding-top: 3px;
            z-index: 3;
            cursor: pointer;
            background-color: #26c6da;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <!-- Material Design -->
    <h2 class="content-heading">Редактирование</h2>
    @if($errors->any())
        <div class="row">
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <form action="{{ route('catalog.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="js-wizard-simple block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Русский</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Английский</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">3. Узбекский</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="ru_title" value="{{ $item->ru_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control" type="text" id="wizard-simple2-lastname" name="ru_description">{{ $item->ru_description }}</textarea>
                                    <label for="wizard-simple2-lastname">Описание</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="en_title" value="{{ $item->en_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control" type="text" id="wizard-simple2-lastname" name="en_description">{{ $item->en_description }}</textarea>
                                    <label for="wizard-simple2-lastname">Описание</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="uz_title" value="{{ $item->uz_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-material">
                                    <textarea class="form-control" type="text" id="wizard-simple2-lastname" name="uz_description">{{ $item->uz_description }}</textarea>
                                    <label for="wizard-simple2-lastname">Описание</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 3 -->
                        <div class="form-group">
                            <div class="form-material">
                                <input type="text" class="form-control" type="text" id="wizard-simple2-lastname" name="url" value="{{ $item->url }}">
                                <label for="wizard-simple2-lastname">Ссылка на страницу</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="material-select2">Категория</label>
                            <select class="form-control" id="catselect2" name="category_id">
                                @if($categories->isEmpty())
                                    <option value="0" disabled>-- нет --</option>
                                @endif
                                @foreach($categories as $category_list)
                                    <option value="{{ $category_list->id }}" @if($item->category_id == $category_list->id) selected @endif @if($category_list->hasChildren()) disabled @endif>{{ strip_tags($category_list->ru_title) }}</option>
                                    @if($category_list->hasChildren())
                                        @include('admin.pages.catalog.components.categories', ['dilimiter' => '---'])
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material-select2">Теги</label>
                            <select class="form-control" name="tags_id[]" multiple style="width: 100%;">
                                @if($tags->isEmpty())
                                <option value="0" disabled>-- нет --</option>
                                @endif
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" @if(in_array($tag->id, $tags_id)) selected @endif>{{ $tag->ru_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Изображение</label>
                            @if($item->image != null)
                            <br>
                            <img src="{{ $item->getImage() }}" width="250">
                            <br>
                            <br>
                            @endif
                            <div class="text-center bg-info-lighter">
                                <div class="input_file">
                                    <div class="remove" style="display: none;">Удалить</div>
                                    <input type="file" class="form-control input_file__input" name="image">
                                    <div class="input_file__text">
                                        <div class="input_file_text_first select">Выбрать</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ссылка на лого</label>
                            <input type="text" name="logo_url" class="form-control" value="{{ $item->logo_url }}">
                        </div>
                        <div class="form-group">
                            <label for="">Пользователи</label>
                            <select style="width: 100%;" class="select2" name="user_id">
                                @forelse($users as $user)
                                    <option @if($item->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }} - {{ $user->id }}</option>
                                @empty
                                    <option value="0">Нет пользователей</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Активный</label>
                            <select style="width: 100%;" class="select2" name="active">
                                <option value="1" @if($item->active == 1) selected @endif>Да</option>
                                <option value="0" @if($item->active == 0) selected @endif>Нет</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Номер телефона</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $item->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label for="">Геолокация</label>
                            <input type="text" name="geo_location" class="form-control" value="{{ $item->geo_location }}">
                        </div>
                    </div>
                    <!-- END Form -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="block pb-3">
                    <div class="block-content text-right">
                        <button class="btn btn-info">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    <script src="/js/select2.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckfinder/ckfinder.js"></script>
    <script>
        $(document).ready(function(){
            var editor = CKEDITOR.replaceAll();
            CKFinder.setupCKEditor( editor );
            $('.select2').select2();
            $('.select22').select2();
            $('#catselect2').select2();
        })
        $('.input_file__input').change(function (e) {
            $('.select').text(e.target.files[0].name);
            $('.remove').attr('style', 'display: block;')
        });
        $('.remove').click(function (e) {
            $('.input_file__input').val('');
            $(this).attr('style', 'display: none;');
            $('.select').text('Выбрать');
        })
        $('.show-password').click(function () {
            var id = $(this).data('id');
            var el = $('#' + id);
            if(el.attr('type') == 'password'){
                $('#' + id).attr('type', 'text');
            }else {
                $('#' + id).attr('type', 'password');
            }
        });
    </script>
@endsection
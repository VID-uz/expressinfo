@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/select2.css">
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
    <form action="{{ route('catalogtags.update', $tag->id) }}" method="post" enctype="multipart/form-data" id="disableThis">
        @csrf
        @method('put')
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

                    <!-- Form -->
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" name="ru_title" value="{{ $tag->ru_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" name="en_title" value="{{ $tag->en_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" name="uz_title" value="{{ $tag->uz_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Активный</label>
                            <select class="form-control" name="active">
                                <option value="1" @if($tag->active == 1) selected @endif>Да</option>
                                <option value="0" @if($tag->active == 0) selected @endif>Нет</option>
                            </select>
                        </div><div class="form-material floating">
                            <select class="form-control" id="material-select2" name="parent_id[]" multiple>
                                @if($categories->isEmpty())
                                    <option value="0" disabled>-- нет --</option>
                                @endif
                                @foreach($categories as $category_list)
                                    <option value="{{ $category_list->id }}" @if(in_array($category_list->id, $categories_id)) selected @endif @if($category_list->hasChildren()) disabled @endif>{{ $category_list->ru_title }}</option>
                                    @if($category_list->hasChildren())
                                        @include('admin.pages.tags.components.categories', ['dilimiter' => '---'])
                                    @endif
                                @endforeach
                            </select>
                            <label for="material-select2">Категория</label>
                        </div>
                    </div>
                    <!-- END Steps Content -->
                    <!-- END Form -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="block pb-3">
                    <div class="block-content text-right">
                        <button id="disableButton" class="btn btn-info">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    <script src="/js/select2.js" type="application/javascript"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckfinder/ckfinder.js"></script>
    <script>
        $(document).ready(function(){
            var editor = CKEDITOR.replaceAll();
            CKFinder.setupCKEditor( editor );
            $('.select2').select2();
        })
    </script>
@endsection
@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/spectrum.css">
    <link rel="stylesheet" href="/css/bootstrap-colorpicker.min.css">
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
            width: 35%;
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
    <form action="{{ route('cgucategories.update', $category->id) }}" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="ru_title" value="{{ $category->ru_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="en_title" value="{{ $category->en_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="wizard-simple2-firstname" name="uz_title" value="{{ $category->uz_title }}">
                                    <label for="wizard-simple2-firstname">Заголовок</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 3 -->

                        <div class="form-material floating">
                            <select class="form-control" id="material-select2" name="parent_id">
                                <option value="0">-- нет --</option>
                                @foreach($categories as $category_list)
                                    <option value="{{ $category_list->id }}" @if($category_list->id == $category->id)  @endif @if($category_list->id == $category->parent_id) selected @endif>{{ strip_tags($category_list->ru_title) }}</option>
                                    @if($category_list->hasChildren())
                                        @include('admin.pages.catalogCategories.components.categories', ['dilimiter' => '---'])
                                    @endif
                                @endforeach
                            </select>
                            <label for="material-select2">Родительская категория</label>
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
                        <button class="btn btn-info">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckfinder/ckfinder.js"></script>
    <script src="/js/spectrum.js"></script>
    <script src="/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $(document).ready(function(){
            var editor = CKEDITOR.replaceAll();
            CKFinder.setupCKEditor( editor );
            
            jQuery(function () {
                Codebase.helpers('colorpicker');
            });
        })
    </script>
    <script>
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
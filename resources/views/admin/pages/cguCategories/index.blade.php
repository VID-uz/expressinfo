@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/datatables/datatables.min.css"/>
@endsection
@section('content')
    <h2 class="content-heading">
        Родительские категории
    </h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Категории</h3>
                    <a href="{{ route('cgucategories.create') }}" class="btn btn-primary">
                        Создать
                    </a>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter" style="overflow-x: scroll;">
                        <thead>
                        <tr>
                            
                            <th style="font-size: 8px;" class="changeDize">Заголовок</th>
                            <th style="font-size: 8px;" class="changeDize">Категории</th>
                            <th style="font-size: 8px;" class="changeDize">Сайты</th>
                            <th class="text-center changeDize" style="width: 100px;font-size: 8px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        <?php $i = 10; ?>
                        @foreach($categories as $category)
                            <tr>
                                <td class="font-w600">{{ strip_tags($category->ru_title) }}</td>
                                <td class="font-w600">
                                    @if($category->hasChildren())
                                        <a href="{{ route('cgucategories.categories', $category->id) }}">Перейти</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="font-w600">
                                    @if($category->hasSites())
                                        <a href="{{ route('cgucategories.sites', $category->id) }}">Перейти</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('cgucategories.edit', [$category->id, 'list_id' => intval($i/10)]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <!-- <form action="{{ route('cgucategories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-sm btn-secondary" onclick="return confirm('Вы уверены?');">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form> -->
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            if(document.documentElement.clientWidth > 800)
            {   
                $('.changeSize').attr('style','font-size: 15px')
            }
            var table = $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                },
                "order": []
            });
            {{--setTimeout(function () {--}}
            {{--@if(isset($_GET['list_id']))--}}
            {{--$.each($('.page-link '), function (index, value) {--}}
            {{--if($(value).data('dt-idx') == {{ $_GET['list_id'] }}){--}}
            {{--console.log($('.paginate_button')[index + 1]);--}}
            {{--$('.paginate_button').eq(index).addClass('active');--}}
            {{--}else{--}}
            {{--$('.paginate_button').eq(index).removeClass('active');--}}
            {{--}--}}
            {{--});--}}
            {{--@endif--}}
            {{--}, 500);--}}
            $('.change_position').change(function (e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('id', $(this).data('id'));
                formData.append('position', e.target.value);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/change/position',
                    dataType: 'html',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.change_position').attr('disabled', '');
                    },
                    success: function(data){
                        if(data != 'true' && data != 'false')
                        {
                            $('select[data-id=' + JSON.parse(data).id + ']').val(JSON.parse(data).position);
                        }

                        $('.change_position').removeAttr('disabled');
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

        } );
    </script>
@endsection
@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dataTables/datatables.min.css"/>
@endsection
@section('content')
    <h2 class="content-heading">
        Дочерние категории - {{ strip_tags($parent->ru_title) }}
    </h2>
    <div class="row">
        <div class="col-md-12"><div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ strip_tags($parent->ru_title) }}</h3>
                    <a href="{{ route('catalogcategories.create') }}" class="btn btn-primary">
                        Создать
                    </a>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center d-none d-md-none d-lg-table-cell" style="width: 50px;"><i class="si si-user"></i></th>
                            <th>Заголовок</th>
                            <th>Под категории</th>
                            <th>Справки</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        <?php $i = 10; ?>
                        @foreach($categories as $category)
                            <tr>
                                <td width="50" class="text-center d-none d-md-none d-lg-table-cell">
                                    <img class="img-avatar img-avatar48" src="{{ $category->getImage() }}" alt="">
                                </td>
                                <td class="font-w600">{{ $category->ru_title}}</td>
                                <td class="font-w600">
                                    @if($category->hasChildren())
                                        <a href="{{ route('catalogcategories.categories', $category->id) }}">Перейти</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="font-w600">
                                    @if($category->hasCatalogs())
                                        <a href="{{ route('catalogcategories.catalogs', $category->id) }}">Перейти</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('catalogcategories.edit', [$category->id, 'list_id' => intval($i/10)]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('catalogcategories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-sm btn-secondary" onclick="return confirm('Вы уверены?');">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        <select name="change_position" class="change_position" data-id="{{ $category->id }}">
                                            <?php $i = 0; ?>
                                            @foreach($categories as $category_list)
                                                <option value="{{ $i }}" @if($category->position == $i) selected @endif>{{ $i }}</option>
                                                <?php $i++; ?>
                                            @endforeach
                                            <option value="{{ $i }}" @if($category->position == $i) selected @endif>{{ $i }}</option>
                                        </select>
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
    <script type="text/javascript" src="/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                },
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
@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dataTables/datatables.min.css"/>
    <style>
        .dataset{
            position: absolute;
            top: 100%;
            background-color: #fff;
            width: 500px;
        }
        .dataset ul{
            padding: 10px;
            list-style: none;
        }
        .dataset ul li{
            padding: 10px;
            border-bottom: 1px solid #e0e1e0;
        }
    </style>
@endsection

@section('content')
    <h2 class="content-heading">
        Все рекламодатели
    </h2>
    <div class="row">
        <div class="col-md-12"><div class="block">
                <div class="block-header block-header-default">
                    <div>
                        <h3 class="block-title">Рекламодатели</h3>
                        <div style="position: relative;">
                            <input type="text" class="form-control searchCatalog" name="searchCatalog" placeholder="Поиск">
                            <div class="dataset" style="display: none;">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('catalog.create') }}" class="btn btn-primary">
                        Создать
                    </a>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center d-none d-md-none d-lg-table-cell" style="width: 50px;"><i class="si si-user"></i></th>
                            <th>Заголовок</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Количество кликов</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Категория</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Активность</th>
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        <?php $i = 10; ?>
                        @foreach($catalog as $item)
                            <tr>
                                <td width="50" class="text-center d-none d-md-none d-lg-table-cell">
                                    <img class="img-avatar img-avatar48 rounded-0" src="{{ $item->getImage() }}" alt="">
                                </td>
                                <td class="font-w600">{{ strip_tags($item->ru_title) }}</td>
                                <td class="d-none d-sm-table-cell">{{ $item->getClickCount() }}</td>
                                <td class="d-none d-sm-table-cell">{{ strip_tags($item->categories->ru_title) }}</td>
                                <td class="d-none d-sm-table-cell">{!! ($item->active) ? '<font style="color: green;">Да</font>' : '<font style="color: red;">Нет</font>' !!}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('catalog.edit', [$item->id, 'list_id' => intval($i/10)]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <form action="{{ route('catalog.destroy', $item->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-sm btn-secondary" onclick="return confirm('Вы уверены?');">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="6">{{ $catalog->links('vendor.pagination.pagination') }}</td>
                            </tr>
                        </tfooter>
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
            $('.searchCatalog').blur(function (e) {
                setTimeout(function () {
                    $('.dataset').attr('style', 'display: none');
                }, 200);
            });
            $('.searchCatalog').focus(function (e) {
                $('.dataset').attr('style', 'display: block');
            });
            $('.searchCatalog').on('input', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData;
                formData.append('text', $(this).val());
                if($(this).val() != '')
                {
                    $.ajax({
                        type: 'POST',
                        url: '/admin/search/catalog',
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            console.log(data);
                            $('.dataset').attr('style', 'display: block');
                            $('.dataset ul').empty();
                            $.each(data, function (key, id) {
                                $('.dataset ul').append('<li><a href="/admin/catalog/' + id + '/edit">' + key + '</a></li>');
                            });
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }else{
                    $('.dataset ul').empty();
                }
            });
        });
    </script>
@endsection
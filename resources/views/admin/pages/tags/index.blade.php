@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dataTables/datatables.min.css"/>
@endsection
@section('content')
    <h2 class="content-heading">
        Все рекламадатели
    </h2>
    <div class="row">
        <div class="col-md-12"><div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Рекламадатели</h3>
                    <a href="{{ route('tags.create') }}" class="btn btn-primary">
                        Создать
                    </a>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Заголовок</td>
                            <td>Активный</td>
                            <td>Категории</td>
                            <td class="text-center" style="width: 100px;">Действия</td>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        <?php $i = 10; ?>
                        @foreach($tags as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->ru_title}}</td>
                                <td>{!! ($item->active == 1) ? '<font style="color: green;">Активный</font>' : '<font style="color: red;">Не активный</font>' !!}</td>
                                <td width="250">
                                    {{ $item->categories()->pluck('ru_title')->implode(', ') }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('tags.edit', [$item->id, 'list_id' => intval($i/10)]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <form action="{{ route('tags.destroy', $item->id) }}" method="post">
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


        } );
    </script>
@endsection
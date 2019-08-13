@extends('admin_user.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dataTables/datatables.min.css"/>
@endsection
@section('content')
    <h2 class="content-heading">
        Все справки
    </h2>
    <div class="row">
        <div class="col-md-12"><div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Пользователи</h3>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center d-none d-md-none d-lg-table-cell" style="width: 50px;"><i class="si si-user"></i></th>
                            <th>Заголовок</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Количество кликов</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Категория</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        <?php $i = 10; ?>
                        @foreach($catalog as $item)
                            <tr>
                                <td width="50" class="text-center d-none d-md-none d-lg-table-cell">
                                    <img class="img-avatar img-avatar48" src="{{ $item->getImage() }}" alt="">
                                </td>
                                <td class="font-w600">{{ strip_tags($item->ru_title) }}</td>
                                <td class="d-none d-sm-table-cell">{{ $item->getClickCount() }}</td>
                                <td class="d-none d-sm-table-cell">{{ ($item->category != null) ? strip_tags($item->categories->ru_title) : '' }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('ads.edit', [$item->id, 'list_id' => intval($i/10)]) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.user.statistic', $item->id) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-bar-chart"></i>
                                        </a>
                                    @if(Auth::user()->isAdmin)
                                        <form action="{{ route('ads.destroy', $item->id) }}" method="post">
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
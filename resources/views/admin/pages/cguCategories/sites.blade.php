@extends('admin.layouts.app')

@section('css')
@endsection
@section('content')
    <h2 class="content-heading">
        Дочерние категории
    </h2>
    <div class="row">
        <div class="col-md-12"><div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">категории</h3>
                    <a href="{{ route('cgucategories.create') }}" class="btn btn-primary">
                        Создать
                    </a>
                </div>
                <div class="block-content">
                    <table id="dataTable" class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center d-none d-md-none d-lg-table-cell" style="width: 50px;"><i class="si si-user"></i></th>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Нужно что нибудь придумать с использованием инкрементации в шабллонах, т.к. думаю это неправильно --}}
                        @foreach($sites as $site)
                            <tr>
                                <td width="50" class="text-center d-none d-md-none d-lg-table-cell">
                                    <img class="img-avatar img-avatar48" src="{{ $site->getImage() }}" alt="">
                                </td>
                                <td class="font-w600">{{ $site->ru_title}}</td>
                                <td class="font-w600">{{ strip_tags($site->ru_title) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('cgusites.edit', $site->id) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('cgusites.destroy', $site->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-sm btn-secondary" onclick="return confirm('Вы уверены?');">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        <select name="position" class="position" data-id="{{ $site->id }}">
                                            <?php $i = 0; ?>
                                            @for($i = 0; $i <= $all; $i++)
                                                <option value="{{ $i }}" @if($site->position == $i) selected="" @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="6">
                                    {{ $sites->links() }}
                                </td>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.position').change(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append('id', $(this).data('id'));
                formData.append('position', e.target.value);
                $.ajax({
                    type: 'POST',
                    url: '/admin/change/position/site',
                    dataType: 'html',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.position').attr('disabled', '');
                    },
                    success: function(data){
                        if(data != 'true' && data != 'false')
                        {
                            $('select[data-id=' + JSON.parse(data).id + ']').val(JSON.parse(data).position);
                        }

                        $('.position').removeAttr('disabled');
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        } );
    </script>
@endsection
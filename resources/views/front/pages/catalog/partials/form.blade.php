<form class="main_form" action="{{ route('home.search') }}" method="POST" enctype="multipart/form-data" style="width: 100%;">
    @csrf
    <div class="main_form_inner">
        <div class="main_input main_input_search categories_input_search">
            <input type="text" class="form-control" id="search" name="search" placeholder="Найти компанию">
        </div>
    </div>
    <button class="btn btn-primary btn-noborder main_btn">
        Найти
    </button>
    @if(isset($tags))
        @include('front.pages.catalog.partials.tags')
    @endif
</form>

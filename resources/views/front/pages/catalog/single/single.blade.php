@if($item->ru_description != '')

    @include('front.pages.catalog.single.catalog_single')

@else

    @include('front.pages.catalog.single.without_desc')

@endif
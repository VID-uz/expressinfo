@foreach($category_list->children as $category_list)
    <option value="{{ $category_list->id }}" @if(in_array($category_list->id, $categories_id)) selected @endif @if($category_list->hasChildren()) disabled @endif>{{ $dilimiter }}{{ strip_tags($category_list->ru_title) }}</option>
    @if($category_list->hasChildren())
        @include('admin.pages.catalog.components.categories', ['dilimiter' => $dilimiter . '---'])
    @endif
@endforeach
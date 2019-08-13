@foreach($category_list->children as $category_list)
    <option value="{{ $category_list->id }}" @if(isset($item)) @if($category_list->id == $item->category_id) selected @endif @endif @if($category_list->hasChildren()) disabled @endif>{{ $dilimiter }}{{ $category_list->ru_title }}</option>
    @if($category_list->hasChildren())
        @include('admin.pages.catalogCategories.components.categories', ['dilimiter' => $dilimiter . '---'])
    @endif
@endforeach
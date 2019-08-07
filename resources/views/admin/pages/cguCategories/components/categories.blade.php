@foreach($category_list->children as $category_list)
    <option value="{{ $category_list->id }}" @if($category_list->id == $category->parent_id) selected @endif>{{ $dilimiter }}{{ strip_tags($category_list->ru_title) }}</option>
    @if($category_list->hasChildren())
        @include('admin.pages.cguCategories.components.categories', ['dilimiter' => $dilimiter . '---'])
    @endif
@endforeach
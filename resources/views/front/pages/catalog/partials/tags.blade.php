
<div class="categories_tags">
    @foreach($category->tags as $tag)
    <a href="{{ route('home.tag.catalogs', [$category->id, $tag->id]) }}" class="categroies_tags_item">
        {{ $tag->ru_title }}
    </a>
    @endforeach
</div>
{{--@isset($article)--}}
    <option
        {{ (isset($article) && $category->id === $article->category->id)
            || (isset($currentCategory) && $category->id === $currentCategory->parent_id)
            ? 'selected' : ''}}
        value="{{ $category->id }}"
    >{{ $category->title }}</option>
    @if (isset($category->child) && !empty($category->child))
        <optgroup label="{{ $category->title }}">
            @foreach($category->child as $child)
                @include('components.pinc.build-category.category-item', ['category' => $child])
            @endforeach
        </optgroup>
    @endif
{{--@endisset--}}
{{--@isset($currentCategory)
    <option {{ $category->id === $currentCategory->parent_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
    @if (isset($category->child)
            && !empty($category->child ))
        <optgroup label="{{ $category->title }}">
            @foreach($category->child as $child)
                @include('components.pinc.build-category.category-item', ['category' => $child])
            @endforeach
        </optgroup>
    @endif
@endisset--}}



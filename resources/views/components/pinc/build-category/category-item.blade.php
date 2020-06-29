<option value="{{ $category->id }}">{{ $category->title }}</option>
@if (isset($category->child) && !empty($category->child))
    <optgroup label="{{ $category->title }}">
        @foreach($category->child as $child)
            @include('components.pinc.build-category.category-item', ['category' => $child])
        @endforeach
    </optgroup>
@endif

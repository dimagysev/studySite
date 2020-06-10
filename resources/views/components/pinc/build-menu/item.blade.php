@foreach( $menu as $item )
    <li {{$attributes ?? ''}}>
        <a href="{{ $item->link }}">{{ $item->title }}</a>
        @isset( $item->child )
            <ul class="sub-menu">
                @include('components.pinc.build-menu.item', ['menu'=>$item->child])
            </ul>
        @endisset
    </li>
@endforeach

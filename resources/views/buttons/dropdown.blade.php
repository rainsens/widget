<div class="btn-group">
    @if($split)
        <button
            type="button"
            class="btn {{ $color }} {{ $size }} dropdown-toggle"
            data-toggle="dropdown">
            <i class="fa {{ $icon }}"></i>
            {{ $text }}
        </button>
        <button type="button" class="btn {{ $color }} {{ $size }} dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
    @else
        <button
            type="button"
            class="btn {{ $color }} {{ $size }} dropdown-toggle"
            data-toggle="dropdown">
            <i class="fa {{ $icon }}"></i>
            {{ $text }}
            <span class="caret ml5"></span>
        </button>
    @endif
    <ul class="dropdown-menu" role="menu">
        @foreach($items as $item)
            @if(!empty($item['divide']) && !$loop->first)
                <li class="divider"></li>
            @endif
            <li>
                <a href="{{ $item['url'] }}">
                    <i class="fa {{ $item['icon'] }}"></i> {{ $item['text'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

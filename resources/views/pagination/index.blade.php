<div class="pagination" data-tab-content="0" data-tab-segment="0">
    <div class="pagination-list">
{{--        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>--}}
        <div class="pagination-list-numbers">
            @foreach($elements as $element)
                @if(is_string($element))
                    <li class="disabled">{{$element}}</li>
                @elseif(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <a class="pagination-list-item pagination-link is-active"
                               data-transition="pagination" href="{{ $url }}">{{ $page }}</a>
                        @else
                            <a class="pagination-list-item pagination-link" data-transition="pagination" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
{{--        <a href="#" class="pagination-list-item pagination-arrow" data-transition="pagination"></a>--}}
    </div>
</div>


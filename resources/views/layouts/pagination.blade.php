<div class="row no-gutters">

            <span class="btn btn-outline-success button-look btn-green pagination-info">20 per page</span>

@if ($paginator->hasPages())
        <div class="ml-auto">
          <nav aria-label="Page navigation example">
            <ul class="pagination custom-pagination">
            <li class="page-item">
                <a class="page-link  pagination-arrow-2" href="{{ $paginator->url(1) }}" aria-label="Previous" >
                    <span aria-hidden="true">
                        <img src="{{asset('/img/first.png')}}" alt="">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
            {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link  pagination-arrow-1" href="#" aria-label="Previous" >
                    <span aria-hidden="true">
                        <img src="{{asset('/img/back.png')}}" alt="">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
        @else
        <li class="page-item">
                <a class="page-link  pagination-arrow-1" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" >
                    <span aria-hidden="true">
                        <img src="{{asset('/img/back.png')}}" alt="">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item"><a class="page-link" href="#">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item"><a class="page-link active" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <li class="page-item">
                <a class="page-link  pagination-arrow-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                    <span aria-hidden="true">
                    <img src="{{asset('/img/next.png')}}" alt="">
                    </span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                @else
                <li class="page-item disabled">
                <a class="page-link pagination-arrow-1" href="#" aria-label="Next" >
                    <span aria-hidden="true">
                        <img src="{{asset('/img/next.png')}}" alt="">
                        
                    </span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                @endif
                <li class="page-item">
                <a class="page-link  pagination-arrow-2" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Previous" >
                    <span aria-hidden="true">
                        <img src="{{asset('/img/last.png')}}" alt="">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
            </ul>
          </nav>
        </div>

@endif
</div>
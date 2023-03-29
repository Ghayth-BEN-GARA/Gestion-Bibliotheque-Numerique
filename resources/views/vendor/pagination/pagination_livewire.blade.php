<nav>
    <ul class = "pagination pagination-rounded mb-0">
        @if ($paginator->hasPages())
            @if (!$paginator->onFirstPage())
                <li class = "page-item">
                    <a class = "page-link" href = "javascript:void(0)" wire:click = "setPage('{{ $paginator->previousPageUrl() }}')" aria-label = "Previous">
                        <span aria-hidden = "true">Précédent</span>
                    </a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class = "page-item">
                        <a class = "page-link disabled" href = "javascript: void(0)">{{$element}}</a>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class = "page-item active">
                                <a class = "page-link" href = "javascript: void(0)">{{$page}}</a>
                            </li>
                        @else
                            <li class = "page-item">
                                <a class = "page-link" href = "javascript:void(0)" wire:click = "setPage('{{ $url }}')">{{$page}}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class = "page-item">
                    <a class = "page-link" href = "javascript:void(0)" wire:click = "setPage('{{ $paginator->nextPageUrl() }}')" aria-label = "Next">
                        <span aria-hidden = "true">Suivant</span>
                    </a>
                </li>
            @endif
        @endif
    </ul>
</nav>

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
     class="bg-white shadow-md rounded-md flex items-center justify-between py-3 px-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                <span class="text-gray-500">前へ</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-blue-600 hover:text-blue-800" aria-label="{{ __('pagination.previous') }}">
                &lsaquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="text-gray-500">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="text-rose-600">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="text-gray-500 hover:text-blue-600">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="hover:text-blue-800" aria-label="{{ __('pagination.next') }}">
             <span class="text-gray-500">次へ</span>

            </a>
        @else
            <span class="disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                <span class="text-gray-500">前へ</span>
            </span>
        @endif
    </nav>
@endif
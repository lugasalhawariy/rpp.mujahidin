<div>
    @if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="page-link" href="#">Previous</button>
                </li>  
            @endif
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="page-link" href="#">Next</button>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" href="#">Next</span>
                </li>
            @endif
        </ul>
    </nav>
    @endif
</div>
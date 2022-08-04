<div>
    <span style="font-size: 0.9rem;">
      <i class="fas fa-shopping-cart text-info mr-1"></i>
    </span>
    
    <span wire:poll.30000ms class="badge badge-pill
        @if ($newOrderCount > 0)
          badge-danger
        @else
          badge-light border
        @endif
        ">
      {{ $newOrderCount }}
    </span>
</div>

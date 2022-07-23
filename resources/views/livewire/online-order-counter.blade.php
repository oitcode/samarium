<div>
    <span style="font-size: 0.8rem;">
      New Orders:
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

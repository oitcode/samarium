<div>
    <span style="font-size: 0.8rem;">
      New Orders:
    </span>
    <span wire:poll.30000ms class="badge badge-pill badge-danger">
      {{ $newOrderCount }}
    </span>
</div>

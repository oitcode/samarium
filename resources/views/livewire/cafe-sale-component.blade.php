<div class="p-3 p-md-0">
    <div wire:offline class="border p-2 mb-3 text-secondary">
      YOU ARE OFFLINE
    </div>

    @if ($modes['workingTableDisplay'])
      @livewire ('seat-table-work-display', ['seatTable' => $workingSeatTable,])
    @else
      @livewire ('seat-table-list')
    @endif
</div>

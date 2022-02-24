<div>
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
      </div>
    </div>

    @if ($modes['workingTableDisplay'])
      @livewire ('seat-table-work-display', ['seatTable' => $workingSeatTable,])
    @else
      @livewire ('seat-table-list')
    @endif
</div>

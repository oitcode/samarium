<div>
  <div class="row">
    @foreach ($seatTables as $seatTable)
      <div class="col-md-3 mb-4">
        @livewire ('seat-table-list-display', ['seatTable' => $seatTable,])
      </div>
    @endforeach
  </div>
</div>

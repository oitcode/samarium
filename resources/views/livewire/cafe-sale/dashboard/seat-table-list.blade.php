<div>

  {{-- For bigger screens --}}
  <div class="d-none d-md-block mt-3">
    <div class="row">
      @foreach ($seatTables as $seatTable)
        <div class="col-md-3 mb-4">
          @livewire ('cafe-sale.dashboard.seat-table-list-display', ['seatTable' => $seatTable,], key('seat-table-'.$seatTable->seat_table_id))
        </div>
      @endforeach
    </div>
  </div>

  {{-- For smaller screens --}}
  <div class="row d-md-none">
    @foreach ($seatTables as $seatTable)
      <div class="col-6 mb-4">
        @livewire ('cafe-sale.dashboard.seat-table-list-display', ['seatTable' => $seatTable,], key('seat-table-'.$seatTable->seat_table_id))
      </div>
    @endforeach
  </div>

</div>

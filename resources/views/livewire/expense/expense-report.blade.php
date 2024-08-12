<div>

  <div class="mt-3 text-secondary py-3" style="font-size: 1.3rem;">

    <input type="date" wire:model="startDate" class="mr-3" />
    <input type="date" wire:model="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="enableChartAndGoOn">
      Go
    </button>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  <div class="my-4 pl-2 font-weight-bold" style="font-size: 1rem;">
    <span style="font-size: 1.3rem;">
    Total:
    @php echo number_format( $total ); @endphp
    </span>
  </div>


  {{-- Show chart and table --}}
  <div class="row">

    <div class="col-md-6">

      <div class="table-responsive border bg-white">
        <table class="table" style="font-size: 1.1rem;">
          <thead>
            <th>Category</th>
            <th>Total</th>
          </thead>
          <tbody>
            @foreach ($expenseByCategory as $key => $val)
              <tr>
                <td>
                  {{ $key }}
                </td>
                <td>
                  @php echo number_format( $val ); @endphp
                </td>
              <tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6">
    </div>
  </div>

</div>

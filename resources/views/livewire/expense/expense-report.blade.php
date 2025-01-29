<div>

  <div class="mt-3 text-secondary py-3">
    <input type="date" wire:model="startDate" class="mr-3" />
    <input type="date" wire:model="endDate" class="mr-3" />
    <button class="btn btn-success" wire:click="enableChartAndGoOn">
      Go
    </button>
    @include ('partials.dashboard.spinner-button')
  </div>

  <div class="my-4 pl-2 font-weight-bold">
    <span>
    Total:
    @php echo number_format( $total ); @endphp
    </span>
  </div>

  {{-- Show chart and table --}}
  <div class="row">
    <div class="col-md-6">
      <div class="table-responsive border bg-white">
        <table class="table">
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
  </div>

</div>

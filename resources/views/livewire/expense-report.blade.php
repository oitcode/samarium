<div>

  <div class="mt-3 text-secondary py-3" style="font-size: 1.3rem;">
    @if (false)
    <i class="fas fa-calendar mr-2"></i>
    @endif

    <input type="date" wire:model.defer="startDate" class="mr-3" />
    <input type="date" wire:model.defer="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="getExpensesForDateRange">
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


  {{-- Expense by Category --}}
  <div>
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
                {{ $val }}
              </td>
            <tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

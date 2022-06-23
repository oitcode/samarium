<div>
  <h2 class="h5">
    Product purchase count
  </h2>

  {{-- Date bar --}}
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

  <div class="table-responsive border">
    <table class="table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Count</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

</div>

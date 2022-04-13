<div class="card shadow-sm h-100">
  <div class="card-body p-0">

    <div class="my-3 text-secondary p-3" style="font-size: 1.3rem;">

      <div>
        <i class="fas fa-calendar mr-2"></i>
        <input type="date" wire:model.defer="startDate" class="mr-3" />
      </div>

      <div>
        <i class="fas fa-calendar mr-2"></i>
        <input type="date" wire:model.defer="endDate" class="mr-3" />
      </div>

      <div class="my-2">
        <button class="btn btn-success" wire:click="render">
          Go
        </button>
      </div>

      <button wire:loading class="btn">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>
    </div>

    <div class="table-responsive mb-0">
      <table class="table mb-0" style="font-size: 1.3rem;">
        <tbody>

          <tr>
            <th class="text-secondary">Sales</th>
            <td>
              @php echo number_format( $saleInvoiceTotal ); @endphp
            </td>
          </tr>

          <tr>
            <th class="text-secondary">Purchases</th>
            <td>
              @php echo number_format( $purchaseTotal ); @endphp
            </td>
          </tr>

          <tr>
            <th class="text-secondary">Expense</th>
            <td>
              @php echo number_format( $expenseTotal ); @endphp
            </td>
          </tr>

          <tr class="@if ($netTotal >= 0) bg-success text-white @else bg-danger text-white @endif">
            <th>Net</th>
            <td>
              @php echo number_format( $netTotal ); @endphp
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>

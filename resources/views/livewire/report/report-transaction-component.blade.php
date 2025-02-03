<div class="card shadow-sm h-100">

  <div class="card-body p-0">
    <div class="m-3">
      <h2 class="h4">
        Net Calculation
      </h2>
    </div>

    <div class="my-3 text-secondary p-3">
      <div>
        <i class="fas fa-calendar mr-2"></i>
        <input type="date" wire:model="startDate" class="mr-3" />
      </div>
      <div>
        <i class="fas fa-calendar mr-2"></i>
        <input type="date" wire:model="endDate" class="mr-3" />
      </div>
      <div class="my-2">
        <button class="btn btn-success" wire:click="render">
          Go
        </button>
      </div>
      @include ('partials.dashboard.spinner-button')
    </div>

    <div class="table-responsive mb-0">
      <table class="table mb-0">
        <tbody>
          <tr>
            <th class="text-secondary">Sales</th>
            <td>
              {{ config('app.transaction_currency') }}
              @php echo number_format( $saleInvoiceTotal ); @endphp
            </td>
          </tr>
          <tr>
            <th class="text-secondary">Purchases</th>
            <td>
              {{ config('app.transaction_currency') }}
              @php echo number_format( $purchaseTotal ); @endphp
            </td>
          </tr>
          <tr>
            <th class="text-secondary">Expense</th>
            <td>
              {{ config('app.transaction_currency') }}
              @php echo number_format( $expenseTotal ); @endphp
            </td>
          </tr>
          <tr class="@if ($netTotal >= 0) bg-success text-white @else bg-danger text-white @endif">
            <th>Net</th>
            <td>
              {{ config('app.transaction_currency') }}
              @php echo number_format( $netTotal ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

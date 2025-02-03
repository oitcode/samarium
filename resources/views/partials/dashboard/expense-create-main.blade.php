<div>

  {{-- Items grid --}}
  <div class="card mb-3 shadow-sm">
    <div class="card-body p-0">
      {{-- Show in bigger screens --}}
      <div class="table-responsive d-none d-md-block">
        <table class="table table-hover border-dark mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm">
              <th class="o-heading">--</th>
              <th class="o-heading">#</th>
              <th class="o-heading">Item</th>
              <th class="o-heading">Category</th>
              <th class="o-heading">Amount</th>
            </tr>
          </thead>
  
          @if ($expense->expenseItems && count($expense->expenseItems) > 0)
          <tbody>
            @foreach ($expense->expenseItems as $expenseItem)
              <tr class="font-weight-bold text-white-rm">
                <td>
                  <a href="" wire:click.prevent="" class="">
                  <i class="fas fa-trash text-danger"></i>
                  </a>
                </td>
                <td class="text-secondary">
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $expenseItem->name }}
                </td>
                <td>
                  {{ $expenseItem->expenseCategory->name }}
                </td>
                <td>
                  {{ config('app.transaction_currency_symbol') }}
                  {{ $expenseItem->amount }}
                </td>
              </tr>
            @endforeach
          </tbody>
          @else
            <tr>
              <td colspan="5" class="p-0">
                <div class="p-0 bg-white border text-muted">
                  <p class="font-weight-bold h4 py-4 text-center" style="color: #fe8d01;">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    No items in the list
                  <p>
                </div>
              </td>
            </tr>
          @endif
        </table>
      </div>
    </div>
  </div>

</div>

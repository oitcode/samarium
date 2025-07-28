<div class="bg-white border p-2 o-border-radius py-4 mb-3">
<div class="d-flex justify-content-between mt-2 mb-4 px-1">
  <h2 class="h5 o-heading px-1">Expense</h2>
  <div class="px-2 py-3-rm border-rm">
    <div class="d-flex">
      <div class="mr-3 font-weight-bold">
        Total:
        {{ config('app.transaction_currency_symbol') }}
        @php echo number_format( $totalExpenseAmount ); @endphp
      </div>
      <div class="font-weight-bold">
        <span class="badge-pill mr-3 text-primary px-3 py-1" style="background-color: #e3f2fd;">
          Bills:
          {{ $todayExpenseCount }}
        </span>
      </div>
    </div>
  </div>
</div>

<div>
  <div>
    @if (true)
    <div class="table-responsive mb-3 border o-border-radius">
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0 text-nowrap">
        <thead>
          <tr class="table-primary">
            <th class="o-heading" style="width: 100px;">ID</th>
            <th class="o-heading" style="width: 200px;">Time</th>
            <th class="o-heading" style="width: 500px;">Vendor</th>
            <th class="o-heading " style="width: 200px;">Total</th>
          </tr>
        </thead>
  
        <tbody class="bg-white">
          @if (count($expenses) > 0)
            @foreach ($expenses as $expense)
              <tr class="table-danger" role="button" wire:click="displayExpense({{ $expense }})">
                <td class="text-secondary-rm" wire:click="" role="button">
                  <span class="text-primary-rm">
                  {{ $expense->expense_id }}
                  </span>
                </td>
                <td class="">
                  <div>
                    {{ $expense->created_at->format('H:i A') }}
                  </div>
                </td>
                <td class="">
                  @if ($expense->vendor)
                    <i class="fas fa-user-circle text-muted-rm mr-2"></i>
                    {{ $expense->vendor->name }}
                  @else
                    <i class="fas fa-exclamation-circle text-warning-rm mr-1"></i>
                    <span class="text-secondary-rm">
                      Unknown
                    </span>
                  @endif
                </td>
                <td class="font-weight-bold">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $expense->getTotalAmount() ); @endphp
                </td>
              </tr>
            @endforeach
          @else
            <tr class="table-danger">
              <td colspan="4" class="py-4">
                <i class="fas fa-exclamation-circle mr-1"></i>
                No expense
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
    @endif
    
    {{-- Payment by types --}}
    <div class="border mb-3 o-border-radius pt-4">
      <h2 class="h6 o-heading px-3 mb-4">
        Payment by types
      </h2>
      <div class="table-responsive o-border-bottom-radius">
        <table class="table text-nowrap mb-0">
          <thead>
            <tr class="table-primary">
              @foreach ($expensePaymentByType as $key => $val)
                <th class="o-heading">
                  {{ $key }}
                </th>
              @endforeach
              <th class="o-heading">
                Pending
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-warning">
              @foreach ($expensePaymentByType as $key => $val)
                <td>
                  {{ config('app.transaction_currency_symbol') }}
                  {{ $val }}
                </td>
              @endforeach
              <td>
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $netExpensePendingAmount ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</div>

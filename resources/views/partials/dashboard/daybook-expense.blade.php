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
        Bills: {{ $todayExpenseCount }}
      </div>
    </div>
  </div>
</div>

<div>
  <div>
    @if (true)
    <div class="table-responsive mb-3 border o-border-radius">
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
        <thead>
          <tr class=" ">
            <th class="o-heading " style="width: 100px;">ID</th>
            <th class="o-heading d-none d-md-table-cell" style="width: 200px;">Time</th>
            <th class="o-heading d-none d-md-table-cell" style="width: 500px;">Vendor</th>
            <th class="o-heading " style="width: 200px;">Total</th>
          </tr>
        </thead>
  
        <tbody class="bg-white">
          @if (count($expenses) > 0)
            @foreach ($expenses as $expense)
              <tr class=" " role="button" wire:click="displayExpense({{ $expense }})">
                <td class="text-secondary-rm" wire:click="" role="button">
                  <span class="text-primary-rm">
                  {{ $expense->expense_id }}
                  </span>
                </td>
                <td class="d-none d-md-table-cell">
                  <div>
                    {{ $expense->created_at->format('H:i A') }}
                  </div>
                </td>
                <td class="d-none d-md-table-cell">
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
            <tr class="table-warning">
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
    <div class="border mb-3 o-border-radius py-4">
      <h2 class="h6 o-heading px-3 mb-4">
        Payment by types
      </h2>
      <div class="m-0 px-3 d-flex">
        @foreach ($expensePaymentByType as $key => $val)
          <div class="mb-4 mr-5">
                <h2 class="h6 mb-3 o-heading ">
                  {{ $key }}
                </h2>
                <h2 class="h6 ">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $val ); @endphp
                </h2>
          </div>
        @endforeach
  
        {{-- Pending Amount --}}
        <div class="">
          <h2 class="h6 text-muted-rm mb-3 o-heading ">
            Pending
          </h2>
          <h2 class="h6 ">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format( $netExpensePendingAmount ); @endphp
          </h2>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

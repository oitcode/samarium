<div class="p-2 bg-danger text-white border">

  <h2 class="h5 o-heading py-2 px-1 text-white">Expense</h2>
  <div class="my-3 px-2 py-3 bg-danger border">
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
  
  <div>
    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block mb-3">
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
        <thead>
          <tr class="bg-danger text-white">
            <th class="o-heading text-white" style="width: 100px;">ID</th>
            <th class="o-heading text-white d-none d-md-table-cell" style="width: 200px;">Time</th>
            <th class="o-heading text-white d-none d-md-table-cell" style="width: 500px;">Vendor</th>
            <th class="o-heading text-white" style="width: 200px;">Total</th>
          </tr>
        </thead>
  
        <tbody class="bg-white">
          @if (count($expenses) > 0)
            @foreach ($expenses as $expense)
              <tr class="bg-danger text-white" role="button" wire:click="displayExpense({{ $expense }})">
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
            {{-- Todo --}} 
          @endif
        </tbody>
      </table>
    </div>
  
    {{-- Show in smaller screens --}}
    <div class="table-responsive d-md-none bg-white border mb-3">
      <table class="table">
        <tbody>
          @foreach ($expenses as $expense)
            <tr class="" role="button" wire:click="displayExpense({{ $expense }})">
              <td class="text-secondary-rm" wire:click="" role="button">
                <span class="text-primary">
                {{ $expense->expense_id }}
                </span>
                <div>
                  {{ $expense->created_at->format('H:i A') }}
                </div>
              </td>
              <td>
  
                @foreach ($expense->expensePayments as $expensePayment)
                <span class="badge badge-pill ml-3">
                  {{ $expensePayment->expensePaymentType->name }}
                </span>
                @endforeach
  
                <div>
                  @if ($expense->vendor)
                    <i class="fas fa-circle text-success mr-3"></i>
                    {{ $expense->vendor->name }}
                  @endif
                </div>
              </td>
              <td class="font-weight-bold">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $expense->getTotalAmount() ); @endphp
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
    {{-- Nav links for pagination -- TODO -- --}}
    <div>
      {{ $expenses->links() }}
    </div>
    
    {{-- Payment by types --}}
    <div class="border">
      <h2 class="h6 o-heading bg-danger text-white p-3 mb-0 border">
        Payment by types
      </h2>
      <div class="row border-rm m-0 p-3 bg-danger text-dark d-flex">
  
        @foreach ($expensePaymentByType as $key => $val)
          <div class="mb-4 mr-5">
                <h2 class="h6 mb-3 o-heading text-white">
                  {{ $key }}
                </h2>
                <h2 class="h6 text-white">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $val ); @endphp
                </h2>
          </div>
        @endforeach
  
        {{-- Pending Amount --}}
        <div class="text-white">
          <h2 class="h6 text-muted-rm mb-3 o-heading text-white">
            Pending
          </h2>
          <h2 class="h6 text-white">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format( $netExpensePendingAmount ); @endphp
          </h2>
        </div>
      </div>
    </div>
  </div>

</div>

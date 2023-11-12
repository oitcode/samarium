<div>
  <h2 class="font-weight-bold pt-1" style="font-size: 1.5rem;">
    <span class="mr-2">
      Rs
    </span>
    @php echo number_format( $totalExpenseAmount ); @endphp
  </h2>
</div>

<div class="row">


  <div class="col-md-12">
    @if (true)

      {{-- Show in bigger screens --}}
      <div class="table-responsive d-none d-md-block mb-5">
        <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
          <thead>
            <tr class="bg-white" style="font-size: 1rem;">
              <th style="width: 100px;">ID</th>
              <th class="d-none d-md-table-cell" style="width: 200px;">Time</th>
              <th class="d-none d-md-table-cell" style="width: 500px;">Vendor</th>
              <th style="width: 200px;">Total</th>
            </tr>
          </thead>

          <tbody class="bg-white" style="font-size: calc(0.7rem + 0.3vw);">
            @if (count($expenses) > 0)
              @foreach ($expenses as $expense)
                <tr class="" role="button" wire:click="displayExpense({{ $expense }})">
                  <td class="text-secondary-rm"
                      style="font-size: 1rem;"
                      wire:click=""
                      role="button">
                    <span class="text-primary">
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
                      <i class="fas fa-user-circle text-muted mr-2"></i>
                      {{ $expense->vendor->name }}
                    @else
                      <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                      <span class="text-secondary" style="font-size: 1rem;">
                        Unknown
                      </span>
                    @endif
                  </td>
                  <td class="font-weight-bold">
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
      <div class="table-responsive d-md-none bg-white border">
        <table class="table">
          <tbody>
            @foreach ($expenses as $expense)
              <tr class="" role="button" wire:click="displayExpense({{ $expense }})">
                <td class="text-secondary-rm"
                    style="font-size: 1rem;"
                    wire:click=""
                    role="button">
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
                <td class="font-weight-bold" style="font-size: 1rem;">
                  Rs
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

    @else
      <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
        No expenses.
      </div>
    @endif
    
    {{-- Payment by types --}}
    <div class="mt-4 border">
      <h2 class="h5 font-weight-bold bg-white p-3 mb-0 border">
        Payment by types
      </h2>
      <div class="row border-rm m-0 p-3 bg-white text-dark d-flex">

        @foreach ($expensePaymentByType as $key => $val)
          <div class="mb-4 mr-5">
                <h2 class="text-muted-rm mb-3 font-weight-bold h6">
                  {{ $key }}
                </h2>
                <h3 class="text-dark-rm font-weight-bold h5">
                  Rs
                  @php echo number_format( $val ); @endphp
                </h3>
          </div>
        @endforeach

        {{-- Pending Amount --}}
        <div class="">
          <h2 class="text-muted mb-3 font-weight-bold h6">
            Pending
          </h2>
          <h3 class="text-danger font-weight-bold h5">
            Rs
            @php echo number_format( $netExpensePendingAmount ); @endphp
          </h3>
        </div>

      </div>
    </div>

  </div>

</div>

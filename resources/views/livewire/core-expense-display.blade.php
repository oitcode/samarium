<div class="bg-white shadow-rm">

  <div class="border p-0">
    @if (false)
    <div class="d-flex mb-0 p-2 justify-content-end bg-success text-white border">
      <button class="btn btn-light border rounded-circle" wire:click="$emit('exitSaleInvoiceDisplayMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>
    @endif

    {{-- Company Info --}}
    <div class="d-flex justify-content-between p-3 border-bottom bg-success-rm text-white-rm">

      <div class="">
        <div class="mb-1">
          <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 1rem">
              Expense ID:
            </span>
            <span style="font-size: 1.2rem;">
              {{ $expense->expense_id }}
            </span>
          </div>
        </div>

        <div class="mb-1">
          <div class="text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.8rem">
              Date:
            </span>
            <span style="font-size: 1rem">
              {{ $expense->created_at->toDateString() }}
            </span>
          </div>
        </div>
      </div>
      <div class="">
        @if (true)
        <div class="mb-3 p-2 bg-danger text-white text-center" style="{{--background-color: orange;--}}">
          EXPENSE
        </div>
        @endif
      </div>
    </div>

    {{-- Main Info --}}
    <div class="shadow-rm">

      {{-- Items List --}}
      {{-- Show in bigger screens --}}
          @if (false)
          <div class="card border-0">
            <div class="card-body text-dark" style="background-color: #ffe;">
              <h2 class="h5">
                {{ $expense->name }}
              </h2>
              <h2 class="h4">
                Rs
                @php echo number_format( $expense->getTotalAmount() ); @endphp
              </h2>
              <h2 class="h6">
                @foreach ($expense->expenseAdditions as $expenseAddition)
                  {{ $expenseAddition->expenseAdditionHeading->name }}
                  Rs
                  @php echo number_format( $expenseAddition->amount ); @endphp
                @endforeach
              </h2>
              <h2 class="h6">
                {{ $expense->expenseCategory->name }}
              </h2>
            </div>
          </div>
          @endif



      {{-- Show in bigger screens --}}
      <div class="table-responsive border bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
              <th>Item</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody>
            <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
              <td>
                {{ $expense->name }}
              </td>
              <td>
                @php echo number_format( $expense->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
          </tbody>



          @if (true)

          <tfoot class="bg-success-rm text-white-rm mt-4">
            @if (false)
            <tr class="bg-primary-rm">
             <td colspan="1" style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-right">
                <strong>
                Subtotal
                </strong>
              </td>
              <td style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold">
                @php echo number_format( $expense->getTotalAmountRaw() ); @endphp
              </td>
            </tr>
            @endif
            @foreach ($expense->expenseAdditions as $expenseAddition)
              <tr class="border-0 mb-0 p-0">
                <td colspan="1" style="font-size: calc(0.6rem + 0.2vw);"
                    class="
                      font-weight-bold text-right-rm border-0 p-0 pl-1 pt-2
                    ">
                  {{ $expenseAddition->expenseAdditionHeading->name }}
                  @if (strtolower($expenseAddition->expenseAdditionHeading->name) == 'vat')
                  ( 13% )
                  @endif
                </td>
                <td style="font-size: calc(0.6rem + 0.2vw);"
                    class="
                      @if ($expenseAddition->expenseAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 p-0 pl-1 pt-2">
                  @if (false)
                  NRs
                  &nbsp;&nbsp;
                  @endif
                  @php echo number_format( $expenseAddition->amount ); @endphp
                </td>
              </tr>
            @endforeach

            <tr class="border-0 bg-light text-dark p-0">
              <td colspan="1" style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold text-right-rm border-0">
                Total
              </td>
              <td style="font-size: calc(1rem + 0.2vw);" class="font-weight-bold border-0">
                @php echo number_format( $expense->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>
          @endif

        </table>
      </div>








    </div>

  </div>
</div>

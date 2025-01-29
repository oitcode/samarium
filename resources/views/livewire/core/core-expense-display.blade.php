<div class="bg-white">

  {{--
  |
  | Toolbar.
  |
  --}}

  @if ($display_toolbar)
    <x-toolbar-component>
      <x-slot name="toolbarInfo">
        Expense
        <i class="fas fa-angle-right mx-2"></i>
        {{ $expense->expense_id }}
      </x-slot>
      <x-slot name="toolbarButtons">
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-refresh"></i>
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-print mr-1"></i>
          Print
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-pdf-o mr-1"></i>
          PDF
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
          <i class="fas fa-file-excel-o mr-1"></i>
          Excel
        </x-toolbar-button-component>
        <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitDisplayExpenseMode')">
          Close
        </x-toolbar-button-component>
      </x-slot>
    </x-toolbar-component>
  @endif

  <div class="border p-0">
    {{-- Company Info --}}
    <div class="d-flex justify-content-between p-3 border-bottom">
      <div>
        <span class="o-heading">
          Expense ID:
        </span>
        <br/>
        <span>
          {{ $expense->expense_id }}
        </span>
      </div>
      <div>
        <span class="o-heading">
          Date:
        </span>
        <br/>
        <span>
          {{ $expense->date }}
        </span>
      </div>
      <div>
        <span class="o-heading">
        Vendor
        </span>
        <br/>
        @if ($expense->vendor)
          {{ $expense->vendor->name }}
        @else
          <span class="text-muted">
            Unknown
          </span>
        @endif
      </div>
      <div class="col-md-3 mb-3">
        <div class="o-heading">
          Created by
        </div>
        <div>
          @if ($expense->creator)
            {{ $expense->creator->name }}
          @else
            Unknown
          @endif
        </div>
      </div>
      <div>
        <div class="o-heading">
          Payment Status
        </div>
        <div>
            @if ( $expense->payment_status == 'paid')
            <span class="badge badge-pill badge-success">
            Paid
            </span>
            @elseif ( $expense->payment_status == 'partially_paid')
            <span class="badge badge-pill badge-warning">
            Partial
            </span>
            @elseif ( $expense->payment_status == 'pending')
            <span class="badge badge-pill badge-danger">
            Pending
            </span>
            @else
            <span class="badge badge-pill badge-secondary">
              {{ $expense->payment_status }}
            </span>
            @endif
        </div>
        <div>
          <span class="btn p-0 text-primary" wire:click="enterMode('showPayments')">
            Show payments
          </span>
        </div>
        @if ($modes['showPayments'])
          <div>
            <div>
              Payments
            </div>
            <div>
              @foreach ($expense->expensePayments as $expensePayment)
                <div>
                  Rs
                  @php echo number_format( $expensePayment->amount, 2 ); @endphp
                  <span class="badge badge-pill ml-3">
                  {{ $expensePayment->expensePaymentType->name }}
                  </span>
                  <span class="badge badge-pill ml-3">
                  {{ $expensePayment->payment_date }}
                  </span>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>
      <div>
        <div class="mb-3 p-2 bg-danger text-white text-center">
          EXPENSE
        </div>
      </div>
    </div>
     {{-- Vendor Info --}}
     @if ($expense->vendor)
      <div class="p-3">
        Vendor
        <br>
        {{ $expense->vendor->name }}
      </div>
    @endif

    {{-- Main Info --}}
    <div>
      {{-- Items List --}}
      {{-- Show in bigger screens --}}
      <div class="table-responsive border bg-white mb-0 d-none d-md-block">
        <table class="table table-sm table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr>
              <th class="o-heading">Item</th>
              <th class="o-heading">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($expense->expenseItems as $expenseItem)
              <tr>
                <td>
                  {{ $expenseItem->name }}
                </td>
                <td>
                  @php echo number_format( $expenseItem->amount, 2 ); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot class="mt-4">
            <tr>
             <td colspan="1" class="o-heading text-right pr-3">
                Subtotal
              </td>
              <td class="o-heading">
                @php echo number_format( $expense->getSubTotal(), 2 ); @endphp
              </td>
            </tr>
            @foreach ($expense->expenseAdditions as $expenseAddition)
              <tr class="border-0 mb-0 p-0">
                <td colspan="1" class="font-weight-bold text-right pr-3 border-0">
                  {{ $expenseAddition->expenseAdditionHeading->name }}
                  @if (strtolower($expenseAddition->expenseAdditionHeading->name) == 'vat')
                  ( 13% )
                  @endif
                </td>
                <td
                    class="
                      @if ($expenseAddition->expenseAdditionHeading->effect == 'minus')
                        text-danger
                      @endif
                      font-weight-bold border-0 p-0 pl-1 pt-2">
                  @php echo number_format( $expenseAddition->amount, 2 ); @endphp
                </td>
              </tr>
            @endforeach
            <tr class="border-0 bg-light text-dark p-0">
                <td colspan="1" class="o-heading text-right pr-3 border-0">
                Total
              </td>
              <td class="o-heading border-0">
                @php echo number_format( $expense->getTotalAmount(), 2 ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

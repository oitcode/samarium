<div>

  {{--
  |--------------------------------------------------------------------------
  | Expense Editor Livewire Component Blade File
  |--------------------------------------------------------------------------
  |
  | This blade template handles the expense creation/editing workflow.
  | It displays either a finalized expense or an interactive
  | interface for building the expense including:
  | - Adding/removing items to the expense
  | - Managing payment recording
  | - Real-time expense totals calculation
  | - Print/email functionality (Todo)
  |
  | It uses two other livewire components:
  | - ExpenseEditorAddItem
  | - ExpenseEditorMakePayment
  |
  --}}

  @if ($expense->payment_status == 'paid')
    @livewire ('core.dashboard.core-expense-display', ['expense' => $expense, 'exitDispatchEvent' => 'exitCreateMode',])
  @else
    <x-transaction-create-component>
      <x-slot name="topToolbar">
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
            <x-toolbar-button-component btnBsClass="btn-primary" btnClickMethod="">
              <i class="fas fa-envelope"></i>
              Email
            </x-toolbar-button-component>
            <x-toolbar-button-component btnBsClass="btn-success" btnClickMethod="">
              <i class="fas fa-print"></i>
              Print
            </x-toolbar-button-component>
            <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitExpenseDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </x-toolbar-button-component>
          </x-slot>
        </x-toolbar-component>
      </x-slot>

      <x-slot name="transactionMainInfo">
        <x-transaction-main-info-component>
          <x-slot name="transactionIdName">
            Expense ID
          </x-slot>
          <x-slot name="transactionIdValue">
            {{ $expense->expense_id }}
          </x-slot>
          <x-slot name="transactionDateName">
            Expense Date
          </x-slot>
          <x-slot name="transactionDateValue">
            @if ($modes['backDate'])
              <div>
                <div>
                  <input type="date" wire:model="expense_date">
                  <div class="mt-2">
                    <button class="btn btn-light" wire:click="changeExpenseDate">
                      <i class="fas fa-check-circle text-success"></i>
                    </button>
                    <button class="btn btn-light" wire:click="exitMode('backDate')">
                      <i class="fas fa-times-circle text-danger"></i>
                    </button>
                  </div>
                </div>
              </div>
            @else
              <div class="h6" role="button" wire:click="enterModeSilent('backDate')">
                {{ $expense->date }}
              </div>
            @endif
          </x-slot>
          <x-slot name="transactionPartyName">
            Vendor
          </x-slot>
          <x-slot name="transactionPartyValue">
            @if ($modes['vendorSelected'])
              {{ $expense->vendor->name }}
            @else
              @if ($expense->creation_status == 'progress')
              <div class="d-flex">
                <select class="w-75" wire:model="vendor_id">
                  <option>---</option>
                  @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->vendor_id }}">
                      {{ $vendor->name }}
                    </option>
                  @endforeach
                </select>
                <button class="btn btn-sm btn-light ml-2" wire:click="linkVendorToExpense">
                  Yes
                </button>
              </div>
              @else
                None
              @endif
            @endif
          </x-slot>
          <x-slot name="transactionPaymentStatusName">
            Payment Status
          </x-slot>
          <x-slot name="transactionPaymentStatusValue">
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
          </x-slot>
        </x-transaction-main-info-component>
      </x-slot>

      <x-slot name="transactionAddItem">
        @livewire ('expense.dashboard.expense-editor-add-item', ['expense' => $expense,])
      </x-slot>

      <x-slot name="transactionItemList">
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
                  <tr class="font-weight-bold">
                    <td colspan="5" class="text-center py-4">
                      <i class="fas fa-exclamation-circle mr-1"></i>
                      No items added to the list
                    </td>
                  </tr>
                @endif
              </table>
            </div>
          </div>
        </div>
      </x-slot>

      <x-slot name="transactionTotalBreakdown">
      </x-slot>

      <x-slot name="transactionPayment">
        @if (! $modes['paid'])
          @livewire ('expense.dashboard.expense-editor-make-payment', ['expense' => $expense,])
        @endif
      </x-slot>
    </x-transaction-create-component>
  @endif

</div>

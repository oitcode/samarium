<div>

  @if ($expense->creation_status == 'created')
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
        @include ('partials.dashboard.expense-editor-add-item')
      </x-slot>

      <x-slot name="transactionItemList">
        @include ('partials.dashboard.expense-editor-main')
      </x-slot>

      <x-slot name="transactionTotalBreakdown">
      </x-slot>

      <x-slot name="transactionPayment">
        @if (! $modes['paid'])
          @include ('partials.dashboard.expense-editor-make-payment')
          <div>
            <div class="p-0 m-0">
              @if (! $modes['paid'])
                <button onclick="this.disabled=true;" class="btn btn-success w-100 py-3 o-heading text-white" wire:click="finishCreation">
                  <i class="fas fa-check-circle mr-3"></i>
                  Confirm
                </button>
              @else
                <button onclick="this.disabled=true;" class="btn btn-lg btn-success" wire:click="finishPayment">
                  FINISH
                </button>
                <button onclick="this.disabled=true;" class="btn btn-lg" wire:click="finishPayment" style="background-color: orange">
                  PRINT
                </button>
              @endif
            </div>
          </div>
        @endif
      </x-slot>
    </x-transaction-create-component>
  @endif

</div>

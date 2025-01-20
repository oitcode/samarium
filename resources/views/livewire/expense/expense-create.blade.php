<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
        Expense
        <i class="fas fa-angle-right mx-2"></i>
        {{ $expense->expense_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-primary p-3" wire:click="">
              <i class="fas fa-envelope"></i>
              Email
            </button>
            <button class="btn btn-success p-3" wire:click="">
              <i class="fas fa-print"></i>
              Print
            </button>
            <button class="btn btn-danger p-3" wire:click="$dispatch('exitExpenseDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  {{-- Top info --}}
  <div class="row">
    <div class="col-md-8">
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
            <div class="">
              <div class="d-flex-rm">
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

      @if ($expense->creation_status != 'created')
        @include ('partials.dashboard.expense-create-add-item')
      @endif
      @include ('partials.dashboard.expense-create-main')
    </div>

    @if (! $modes['paid'])
    <div class="col-md-4">
      <div class="border">
        @include ('partials.dashboard.expense-create-make-payment')

        <div>
          <div class="p-0 m-0">
            @if (! $modes['paid'])
            <button
                onclick="this.disabled=true;"
                class="btn btn-success w-100 py-3 o-heading text-white"
                wire:click="finishCreation">
              <i class="fas fa-check-circle mr-3"></i>
              Confirm
            </button>
            @else
              <button
                  onclick="this.disabled=true;"
                  class="btn btn-lg btn-success"
                  wire:click="finishPayment"
                  >
                FINISH
              </button>
              <button
                  onclick="this.disabled=true;"
                  class="btn btn-lg"
                  wire:click="finishPayment"
                  style="background-color: orange">
                PRINT
              </button>
            @endif
          </div>
        </div>
      </div>

    </div>
    @endif
  </div>


</div>

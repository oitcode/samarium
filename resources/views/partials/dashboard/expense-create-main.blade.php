<div>
  {{-- Top Heading Main Info --}}
  <div class="card mb-0 shadow-sm">
    <div class="card-body p-0 bg-primary-rm text-white-rm">

      <div class="row p-0 mt-2" style="margin: auto;">

        <div class="col-md-3 d-flex">
          <div class="mb-4">
            <div class="mb-1 h6 font-weight-bold">
              Expense ID
            </div>
            <div class="h6">
              {{ $expense->expense_id }}
            </div>
          </div>
        </div>

        <div class="col-md-3 d-flex">

          <div class="">
            <div class="mb-1 h6 font-weight-bold">
              Expense Date
            </div>
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
          </div>

        </div>
    
    
        <div class="col-md-3 mb-3 border-left border-right">
          <div class="mb-1 h6 font-weight-bold">
            Vendor
          </div>
          <div class="d-flex">
            @if ($modes['vendorSelected'])
              {{ $expense->vendor->name }}
            @else
              @if ($expense->creation_status == 'progress')
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
              @else
                None
              @endif
            @endif
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="font-weight-bold">
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
        </div>

        <div class="col-md-2">
        </div>
    
      </div>
    </div>
  </div>

  {{-- Items grid --}}
  <div class="card mb-3 shadow-sm">
  
    <div class="card-body p-0">
  
      {{-- Show in bigger screens --}}
      @if (true)
      <div class="table-responsive d-none d-md-block">
        <table class="table table-hover border-dark mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm">
              <th>--</th>
              <th>#</th>
              <th>Item</th>
              <th>Category</th>
              <th>Amount</th>
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
      @endif


    </div>
  </div>
</div>

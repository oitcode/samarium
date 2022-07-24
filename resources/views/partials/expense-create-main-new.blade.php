<div>
  {{-- Top Heading Main Info --}}
  <div class="card mb-0 shadow-sm">
    <div class="card-body p-0 bg-primary-rm text-white-rm">
  
  
      <div class="row p-0 mt-2-rm" style="margin: auto;">
  

        <div class="col-md-2 py-2
            {{ env('OC_ASCENT_BG_COLOR', 'bg-light') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-secondary') }}
            ">
          <div class="d-flex-rm justify-content-end-rm h-100">
            <i class="fas fa-tools
                {{ env('OC_ASCENT_HL_COLOR', 'text-secondary') }}
                "></i>
            <br/>
            <span style="font-size: 1.1rem;">
              Expense
            </span>
          </div>
        </div>
        <div class="col-md-4 d-flex bg-danger-rm text-white-rm">
          <div class="mb-3 d-flex py-2 mr-3">
            <div>
              <div class="text-muted-rm mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                ID
              </div>
              <div class="h6">
                {{ $expense->expense_id }}
              </div>
            </div>
          </div>
  
          <div class="mb-3 py-2">
            <div class="text-muted-rm mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
              Date
            </div>
            <div class="h6">
                {{ $expense->date }}
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3-rm bg-light text-dark py-2 border-left border-right">
          <div class="text-muted-rm mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
            Vendor
          </div>
          <div class="d-flex">
            @if ($modes['vendorSelected'])
              {{ $expense->vendor->name }}
            @else
              @if ($expense->creation_status == 'progress')
              <select class="w-75" wire:model.defer="vendor_id">
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
  
  
        <div class="col-md-2 py-2" style="font-size: calc(0.6rem + 0.2vw);">
          <div class="text-muted-rm" style="font-size: calc(0.6rem + 0.2vw);">
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
            <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
              <th>--</th>
              <th>#</th>
              <th>Item</th>
              <th>Category</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody style="font-size: 1.3rem;">
            @foreach ($expense->expenseItems as $expenseItem)
              <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-white-rm">
                <td>
                  <a href="" wire:click.prevent="" class="">
                  <i class="fas fa-trash text-danger"></i>
                  </a>
                </td>
                <td class="text-secondary" style="font-size: 1rem;">
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
  
        </table>
      </div>
      @endif


    </div>
  </div>
</div>

<div>
  {{-- Top Heading Main Info --}}
  <div class="card mb-0 shadow-sm">
    <div class="card-body p-0 bg-primary-rm text-white-rm">
  
  
      <div class="row p-0 mt-2" style="margin: auto;">
  
        <div class="col-md-3 mb-3-rm">
          <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
            Vendor
          </div>
          <div class="h5">
            xx
          </div>
        </div>
  
        <div class="col-md-2 mb-3 d-flex">
          <div>
            <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
              Expense ID
            </div>
            <div class="h6">
              {{ $expense->expense_id }}
            </div>
          </div>
        </div>
  
        <div class="col-md-2 mb-3">
          <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
            Expense Date
          </div>
          <div class="h6">
              {{ $expense->date }}
          </div>
        </div>
  
        <div class="col-md-3" style="font-size: calc(0.6rem + 0.2vw);">
          <div class="text-muted" style="font-size: calc(0.6rem + 0.2vw);">
            Payment Status
          </div>
          <div>
              {{ $expense->payment_status }}
          </div>
        </div>
        <div class="col-md-2">
          <div class="d-flex justify-content-end h-100">
            <button class="btn btn-light h-100" style="color: green;">
              <i class="fas fa-tools"></i>
              <br/>
              <span style="font-size: 1.1rem;">
                Expense
              </span>
            </button>
          </div>
        </div>
  
  
      </div>
  
    </div>
  </div>

  {{-- Items grid --}}
  <div class="card mb-3 shadow">
  
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

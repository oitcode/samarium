<div>

  {{-- Show in bigger screens --}}


  <div class="row">

    <div class="col-md-4">

      @if (true || $takeaway->status == 'open')
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0 bg-primary-rm text-white-rm" style="{{--background-color: #efe;--}}">


          <div class="row p-0" style="margin: auto;">

            <div class="h-100 col-md-4 d-flex flex-column justify-content-center ">
              <div>
                <div class="text-muted mb-1 mt-3 h6" style="font-size: calc(0.6rem + 0.2vw);">
                  Expense Date
                </div>
                <div class="h6">
                  {{ date('Y-m-d') }}
                </div>
              </div>
            </div>

            <div class="col-md-8">
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
      @endif

@if (true)
<div class="card">
 <div class="card-body" style="font-size: 1rem;">
  
  
    <div class="form-group">
      <label for="">Title</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Category</label>
      <select class="custom-select" wire:model.defer="expense_category_id" style="font-size: 1.3rem;">
        <option>---</option>
        @foreach($expenseCategories as $expenseCategory)
          <option value="{{ $expenseCategory->expense_category_id }}">{{ $expenseCategory->name }}</option>
        @endforeach
      </select>
      @error('expense_category_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        <i class="fas fa-save mr-2"></i>
        Save
      </button>
      <button type="submit"
          class="btn btn-danger" wire:click="$emit('exitCreateMode')"
          style="font-size: 1.3rem;">
        <i class="fas fa-times-circle mr-2"></i>
        Cancel
      </button>
    </div>
  
  </div>
</div>
@endif
    </div>
  
    <div class="col-md-4">
      @include ('partials.expense-create-amount')
    </div>

    <div class="col-md-4">
      @if (true)
        @if (false)
          @livewire ('expense-work-make-payment')
        @endif
        @include ('partials.expense-create-make-payment')
      @endif
    </div>
  </div>

  @if (false)
    @if ($modes['confirmRemoveSaleInvoiceItem'])
      @livewire ('takeaway-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
    @endif
  @endif

</div>


@if (false)
<div class="card">
 <div class="card-body" style="font-size: 0.8rem;">
    <h3 class="h5 text-secondary">Create new expense</h3>
  
  
    <div class="form-group">
      <label for="">Title</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Category</label>
      <select class="custom-select" wire:model.defer="expense_category_id" style="font-size: 1.3rem;">
        <option>---</option>
        @foreach($expenseCategories as $expenseCategory)
          <option value="{{ $expenseCategory->expense_category_id }}">{{ $expenseCategory->name }}</option>
        @endforeach
      </select>
      @error('expense_category_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
      <label for="">Amount</label>
      <input type="text" class="form-control" wire:model.defer="amount" style="font-size: 1.3rem;">
      @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Payment Type</label>
      <select class="custom-select" wire:model.defer="expense_payment_type_id" style="font-size: 1.3rem;">
        <option>---</option>
        @foreach($expensePaymentTypes as $expensePaymentType)
          <option value="{{ $expensePaymentType->expense_payment_type_id }}">{{ $expensePaymentType->name }}</option>
        @endforeach
      </select>
      @error('expense_payment_type_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
  
    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger" wire:click="$emit('exitCreateMode')"
          style="font-size: 1.3rem;">
        Cancel
      </button>
    </div>
  
  </div>
</div>
@endif

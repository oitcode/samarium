<div style="">

  {{-- Show in bigger screen --}}
  <div class="mb-3 border bg-light-rm shadow-sm d-none d-md-block">
  
    <div class="table-responsive m-0">
      <table class="table table-sm table-bordered m-0">
        <thead>
          <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
            <th class="py-2" style="width: 200px;">Expense</th>
            <th class="py-2">Category</th>
            <th class="py-2" style="width: 100px;">Amount</th>
          </tr>
        </thead>
  
        <tbody>
          <tr class="p-0 font-weight-bold" style="height: 50px; font-size: calc(0.8rem + 0.2vw);">
            <td class="p-0 h-100">
              <input class="m-0 w-100 h-100 border-0" type="text" wire:model.defer="add_item_name" wire:keydown.enter="updateProductList"/>
            </td>
            <td class="p-0 h-100">
              @if (true)
              <select class="w-100 h-100 custom-control border-0" wire:model.defer="add_item_expense_category_id">
                <option>---</option>
  
                @foreach ($expenseCategories as $expenseCategory)
                  <option value="{{ $expenseCategory->expense_category_id }}">
                    {{ $expenseCategory->name }}
                  </option>
                @endforeach
              </select>
              @endif
            </td>
            <td>
              <input class="m-0 w-100 h-100 border-0" type="text" wire:model.defer="add_item_amount"/>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  
    <div class="p-2 m-0">
      <div class="row">
        <div class="col-md-8">
          <button class="btn btn-lg btn-success mr-3" wire:click="addItemToExpense" style="font-size: calc(0.7rem + 0.2vw);">
            <i class="fas fa-plus mr-2"></i>
            Add
          </button>
  
          @if (true)
          <button class="btn btn-lg btn-danger" wire:click="resetInputFields" style="font-size: calc(0.7rem + 0.2vw);">
            Reset
          </button>
          @endif
  
          <button wire:loading class="btn">
            <span class="spinner-border text-info mr-3" role="status">
            </span>
          </button>
  
        </div>
        @if ($selectedProduct != null)
          <div class="col-md-4" style="height: 50px;">
            <div class="float-right">
              <img src="{{ asset('storage/' . $selectedProduct->image_path) }}" class="img-fluid" style="height: 50px;">
            </div>
            <div class="clearfix">
            </div>
          </div>
        @endif
      </div>
  
    </div>
  
  </div>

</div>

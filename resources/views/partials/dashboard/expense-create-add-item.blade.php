<div>

  {{-- Show in bigger screen --}}
  <div class="mb-2 border shadow-sm d-none d-md-block">
    <div class="table-responsive m-0">
      <table class="table table-sm table-bordered m-0">
        <thead>
          <tr class="bg-white text-dark">
            <th class="o-heading py-2" style="width: 200px;">Item</th>
            <th class="o-heading py-2">Category</th>
            <th class="o-heading py-2" style="width: 100px;">Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr class="p-0 font-weight-bold">
            <td class="p-0 h-100">
              <input class="m-0 w-100 h-100 border-0" type="text" wire:model="add_item_name" wire:keydown.enter="updateProductList"/>
            </td>
            <td class="p-0 h-100">
              <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="add_item_expense_category_id">
                <option>---</option>
                @foreach ($expenseCategories as $expenseCategory)
                  <option value="{{ $expenseCategory->expense_category_id }}">
                    {{ $expenseCategory->name }}
                  </option>
                @endforeach
              </select>
            </td>
            <td class="p-0 h-100">
              <div class="d-flex h-100">
                <div class="h-100 d-flex flex-column justify-content-center pr-2">
                  {{ config('app.transaction_currency_symbol') }}
                </div>
                <input class="m-0 w-100 h-100 border-0" type="text" wire:model="add_item_amount"/>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  
    <div class="p-2 m-0 bg-white">
        <button class="btn btn-success mr-3" wire:click="addItemToExpense">
          <i class="fas fa-plus mr-2"></i>
          Add
        </button>
        <button class="btn btn-danger" wire:click="resetInputFields">
          Reset
        </button>
        @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>

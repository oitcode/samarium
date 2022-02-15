<div class="card">
  <div class="card-body">
  
    <h3 class="h5">Create new expense</h3>
  
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" class="form-control" wire:model.defer="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Category</label>
      <select class="custom-select" wire:model.defer="expense_category_id">
        <option>---</option>
        @foreach($expenseCategories as $expenseCategory)
          <option value="{{ $expenseCategory->expense_category_id }}">{{ $expenseCategory->name }}</option>
        @endforeach
      </select>
      @error('expense_category_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
      <label for="">Amount</label>
      <input type="text" class="form-control" wire:model.defer="amount">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>
  
  </div>
</div>

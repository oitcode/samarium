<div class="card">
  <div class="card-body">
  
    <h3 class="h5">Create new expense category</h3>
  
    <div class="form-group">
      <label for="">Category name</label>
      <input type="text" class="form-control" wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="mt-4" style="font-size: 1.3rem;">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCategoryCreateMode',])
    </div>
  
  </div>
</div>

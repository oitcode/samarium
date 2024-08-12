<div class="p-3 bg-white">
  <div class="form-group">
    <input type="text" class="form-control" wire:model="name">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['btnText' => 'Cancel', 'clickEmitEventName' => 'productCategoryUpdateNameCancelled',])
  </div>
</div>

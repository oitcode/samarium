<div>

  <div class="form-group">
    <input type="text" class="form-control" wire:model="spec_heading">
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productSpecificationUpdateKeywordCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>

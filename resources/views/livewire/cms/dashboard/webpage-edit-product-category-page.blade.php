<div>

  <div class="form-group">
    <select class="form-control" wire:model="product_category_id">
      <option value="---">---</option>
      @foreach ($productCategories as $productCategory)
        <option value="{{ $productCategory->product_category_id }}">{{ $productCategory->name }}</option>
      @endforeach
    </select>
    @error ('product_category_id')
      <div class="text-danger">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageEditProductCategoryCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>

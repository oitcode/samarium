<div>

  <div class="form-group">
    <label class="h5">Category *</label>
    <select class="custom-select shadow-sm" wire:model="product_category_id">
      <option>---</option>
      @foreach ($productCategories as $productCategory)
        <option value="{{ $productCategory->product_category_id }}">
          {{ $productCategory->name }}
        </option>
      @endforeach
    </select>
    @error ('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div>
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productUpdateCategoryCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>

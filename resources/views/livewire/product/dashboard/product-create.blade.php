<div class="bg-white p-3">

  {{-- Top heading bar --}}
  <div class="mb-4">
    <h1 class="h5 o-heading">
      Create product
    </h1>
  </div>

  <div class="row border pb-0 border-0" style="margin:auto;">
    {{-- Left side of the product create page --}}
    <div class="col-md-6 pl-0">
      <div class="card h-100 border-0 pb-0">
        <div class="card-body pl-0 h-100 pb-0">
          <div class="form-group">
            <label class="h5">Name *</label>
            <input type="text"
                class="form-control shadow-sm"
                wire:model="name">
            @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
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
          <div class="form-group">
            <label class="h5">Selling price *</label>
            <input type="text"
                class="form-control shadow-sm"
                wire:model="selling_price">
            @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="bg-white pb-0">
            <h2 class="h5">
              Description *
            </h2>
            <h3 class="h6 text-muted">
              Enter product description here
            </h3>
            <div class="form-group mb-0">
              <textarea type="text"
                  class="form-control mb-0"
                  rows="5"
                  wire:model="description">
              </textarea>
              @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Right side of the product create page --}}
    <div class="col-md-6 pl-0">
      <div class="bg-white pl-0 p-2 mb-3">
        <h2 class="h5">
          Image
          <span class="text-muted ml-1">
            (Optional)
          </span>
        </h2>
        <h3 class="h6 text-muted">
          Enter product image here
        </h3>
        <div class="form-group">
          <input type="file" class="form-control" wire:model.live="image">
          @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>
    </div>
  </div>

  {{-- Save/Cancel buttons div --}}
  <div class="py-4 m-0">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateProductMode',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>

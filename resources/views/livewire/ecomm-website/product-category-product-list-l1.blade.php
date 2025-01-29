<div class="mt-4">

  @if ($modes['openUpMode'])
    <div class="py-3 px-2 border shadow-sm d-flex justify-content-between"
        wire:click="exitMode('openUpMode')"
        role="button">
      <div>
        <div class="h4 font-weight-bold pt-3">
          {{ $productCategory->name }}
        </div>
      </div>
      <div>
        <img class="img-fluid"
        src="{{ asset('storage/' . $productCategory->image_path) }}"
        alt="{{ $productCategory->name }}"
        style="max-height: 100px; max-width: 100px;">
      </div>
    </div>
  @else
    <div class="py-3 px-2 border shadow-sm d-flex justify-content-between"
        style="background-color: #f5f5f5;"
        wire:click="enterMode('openUpMode')"
        role="button">
      <div>
        <div class="h4 font-weight-bold pt-3">
          {{ $productCategory->name }}
        </div>
      </div>
      <div>
        <img class="img-fluid"
        src="{{ asset('storage/' . $productCategory->image_path) }}"
        alt="{{ $productCategory->name }}"
        style="max-height: 100px; max-width: 100px;">
      </div>
    </div>
  @endif

  @if ($modes['openUpMode'])
    <div>
      {{-- Show in bigger screens --}}
      <div class="my-4">
        {{-- Deal with its products --}}
        @if (count($productCategory->products) > 0)
          <div class="row" wire:key="{{ rand() }}">
            @foreach ($productCategory->products as $product)
              {{-- Do not display inactive products --}}
              @if ($product->is_active == 0)
                @continue
              @endif
    
              {{-- Do not display base products --}}
              @if ($product->is_base_product == 1)
                @continue
              @endif
    
              <div class="col-6 col-md-3 mb-4">
                @livewire ('ecomm-website.product-list-display', ['product' => $product,])
              </div>
            @endforeach
          </div>
        @else
          <div class="p-2 text-secondary">
            No products
          </div>
        @endif
      </div>
    </div>
  @else
  @endif

</div>

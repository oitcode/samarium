<div class="mt-4">
  @if ($modes['openUpMode'])
    <div class="bg-primary-rm text-white-rm py-3 px-2 pl-3-rm border shadow-sm d-flex justify-content-between"
        wire:click="exitMode('openUpMode')"
        role="button">
      <div class="" style=" {{-- background-color: white; color: black;--}} ">
        <div class="h4 font-weight-bold pt-3">
          {{ $productCategory->name }}
        </div>
      </div>
      <div>
        <img class="img-fluid h-25-rm w-100-rm"
        src="{{ asset('storage/' . $productCategory->image_path) }}"
        alt="{{ $productCategory->name }}"
        style="max-height: 100px; max-width: 100px;">
      </div>
    </div>
  @else
    <div class="bg-primary-rm text-white-rm py-3 px-2 pl-3-rm border shadow-sm d-flex justify-content-between"
        style="background-color: #f5f5f5;"
        wire:click="enterMode('openUpMode')"
        role="button">
      <div class="" style=" {{-- background-color: white; color: black;--}} ">
        <div class="h4 font-weight-bold pt-3">
          {{ $productCategory->name }}
        </div>
      </div>
      <div>
        <img class="img-fluid h-25-rm w-100-rm"
        src="{{ asset('storage/' . $productCategory->image_path) }}"
        alt="{{ $productCategory->name }}"
        style="max-height: 100px; max-width: 100px;">
      </div>
    </div>
  @endif

  @if ($modes['openUpMode'])
    <div class="p-3-rm border-rm bg-warning-rm">
    
    
      {{-- Show in bigger screens --}}
      <div class="d-none-rm d-md-block-rm my-4">
    
        {{-- Deal with its products --}}
        @if (true)
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
        @endif
      </div>
    
      </div>
    </div>
  @else
  @endif
</div>

<div class="mt-4">
  @if ($modes['openUpMode'])
    <div class="bg-primary-rm text-white-rm py-3 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
        style="background-color: brown; color: #fff;  {{-- border: 10px solid #aaf;--}} font-size: 1.15rem; border-left: 10px solid brown;"
        wire:click="exitMode('openUpMode')">
      <div class="h2 font-weight-bold pt-3" style=" {{-- background-color: white; color: black;--}} ">
        <i class="far fa-dot-circle mx-1"></i>
        {{ $productCategory->name }}
      </div>
      <div>
        <button class="btn btn-success-rm">
          <i class="fas fa-minus-circle fa-3x text-white"></i>
        </button>
      </div>
    </div>
  @else
    <div class="bg-primary-rm text-white-rm py-3 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
        style="background-color: brown; color: #fff;  {{-- border: 10px solid #aaf;--}} font-size: 1.15rem; border-left: 10px solid brown;"
        wire:click="enterMode('openUpMode')">
      <div class="h2 font-weight-bold pt-3" style=" {{-- background-color: white; color: black;--}} ">
        <i class="far fa-dot-circle mx-1"></i>
        {{ $productCategory->name }}
      </div>
      <div>
        <button class="btn btn-success-rm">
          <i class="fas fa-folder-open fa-3x text-white"></i>
        </button>
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
          <div class="p-2 text-secondary" style="font-size: 1.3rem;">
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

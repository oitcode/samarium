<div class="p-3-rm border-rm bg-warning-rm">

  <div class="bg-danger text-white py-3 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
      style="{{-- background-color: #000; color: #555;  border: 10px solid #aaf;--}} font-size: 1.15rem; border-left: 10px solid brown;">
    <div class="h2 font-weight-bold pt-3" style=" {{-- background-color: white; color: black;--}} ">
      <i class="far fa-dot-circle mx-1"></i>
      {{ $productCategory->name }}
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="d-none-rm d-md-block-rm">

    {{-- First deal with its sub product categories --}}
    @if ($productCategory->subProductCategories)
      @foreach ($productCategory->subProductCategories as $subProductCategory)
        <div class="bg-primary-rm text-white-rm py-1 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
            style="font-size: 1.15rem; border-left: 10px solid brown; background-color: #531; color: white;"
            wire:key="{{ rand() * $subProductCategory->product_category_id }}">
          <div class="h2 font-weight-bold pt-3" wire:key="{{ rand() }}">
            <i class="far fa-dot-circle mx-1"></i>
            {{ $subProductCategory->name }}
          </div>
          <div wire:key="{{ rand() }}">
            <button class="btn" wire:click="displaySubProductCategory({{ $subProductCategory }})">
              <i class="fas fa-folder-open fa-4x text-white"></i>
            </button>
          </div>
        </div>

        <div class="my-3">
            @if (true)
            @if ($modes['displaySubProductCategoryMode'])
              @if (true)
              @if ($displayingSubProductCategory->product_category_id == $subProductCategory->product_category_id)
                @if (count($subProductCategory->products) > 0)
                  <div class="row" wire:key="{{ rand() }}">
                    @foreach ($subProductCategory->products as $product)

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
              @endif
            @endif
            @endif
        </div>
      @endforeach
    @endif

    {{-- Now deal with its products --}}
    @if (false)
    @if (count($productCategory->products) > 0)
      @if ($productCategory->subProductCategories)
        <div class="my-3 bg-danger-rm" style="background-color: #531; color: white;">
          &nbsp;
        </div>
      @endif
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

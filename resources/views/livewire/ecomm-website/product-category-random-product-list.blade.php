<div class="">

  {{-- Show in bigger screens --}}
  <div class="">

    {{-- First deal with its sub product categories --}}
    @if ($productCategory->subProductCategories)
      @foreach ($productCategory->subProductCategories as $subProductCategory)
        @livewire ('ecomm-website.product-category-product-list-l1', ['productCategory' => $subProductCategory,], key(rand()))
      @endforeach
    @endif

    {{-- Now deal with its products --}}
    @if (true)
    @if (count($productCategory->products) > 0)
      @if (true)
      @if (count($productCategory->subProductCategories) > 0)
        <div class="my-3 py-3" style="background-color: #eaeaea; color: black;">
          &nbsp;
        </div>
      @endif
      @endif

      <div class="row" wire:key="{{ rand() }}">
        @foreach ($productCategory->products()->inRandomOrder()->limit(4)->get() as $product)

          {{-- Do not display inactive products --}}
          @if ($product->is_active == 0)
            @continue
          @endif

          {{-- Do not display base products --}}
          @if ($product->is_base_product == 1)
            @continue
          @endif

          {{-- Do not display products show_in_front_end is not yes --}}
          @if ($product->show_in_front_end != 'yes')
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

<div>

  {{-- Online store hero --}}
  @if (false)
  @include ('partials.os.hero')
  @endif


  {{-- Show product search --}}
  @if (false)
  <div class="container p-3 border mt-4">
    @error ('search_name')
      <div class="py-2 text-danger">
        <i class="fas fa-exclamation-circle mr-3"></i>
        Enter search name
      </div>
    @enderror
    <input type="text" class="mr-3" wire:model.defer="search_name" placeholder="Search product"/>
    <button class="btn btn-success shadow-sm" style="font-size: 1.3rem;" wire:click="search">
      Go
    </button>
  </div>
  @endif

  <div>
  @if (! $modes['searchResult'])
    {{-- Show products of each product category --}}
    @foreach ($productCategories as $productCategory)
      @if (count($productCategory->products) > 0)
        <div class="container mt-4">
          @if (false)
          <h2 class="mb-3">
            {{ $productCategory->name }}
          </h2>
          <hr/>
          @endif
          @livewire ('website-product-category-product-list', ['productCategory' => $productCategory,],
              key(rand() * $productCategory->product_category_id))
        </div>
      @endif
    @endforeach
  @else
    <div>
      <div class="container">
        <div class="my-3 text-scondary">
          Displaying
          {{ count($products) }}
          out of
          {{ count($products) }}
          products
        </div>
    
        @if (count($products) > 0)
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-4 mb-4">
                @livewire ('website-product-list-display', ['product' => $product,], key(rand() * $product->product_id))
              </div>
            @endforeach
          </div>
        @else
          <div class="p-2 text-secondary" style="font-size: 1.3rem;">
            Not found: {{ $search_name }} 
          </div>
        @endif
      </div>
    </div>
  @endif
  </div>
</div>

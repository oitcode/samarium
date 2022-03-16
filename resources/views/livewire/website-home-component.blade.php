<div>
  {{-- Show product search --}}
  <div class="container p-3 border mt-4">
    <div class="text-secondary mb-2">
      <h3 class="h4">
        Search product
      </h3>
    </div>
    @error ('search_name')
      <div class="py-2 text-danger">
        <i class="fas fa-exclamation-circle mr-3"></i>
        Enter search name
      </div>
    @enderror
    <input type="text" class="mr-3" wire:model="search_name" />
    <button class="btn btn-success rounded-circle shadow-sm" style="font-size: 1.3rem;" wire:click="search">
      Go
    </button>
  </div>

  <div>
  @if (! $modes['searchResult'])
    {{-- Show products of each product category --}}
    @foreach ($productCategories as $productCategory)
      @if (count($productCategory->products) > 0)
        <div class="container mt-5">
          <h2 class="mb-3">
            {{ $productCategory->name }}
          </h2>
          <hr/>
          @livewire ('website-product-category-product-list', ['productCategory' => $productCategory,],
              key(rand() * $productCategory->product_category_id))
        </div>
      @endif
    @endforeach
  @else
    @livewire ('website-home-search-result', ['products' => $products,])
  @endif
  </div>
</div>

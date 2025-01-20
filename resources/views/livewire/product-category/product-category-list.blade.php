<div>


  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <div class="">

    {{-- Info div --}}
    <div class="d-flex justify-content-between bg-white mt-1 p-2">
      <div class="d-flex flex-column justify-content-center">
        Total product categories: {{ \App\ProductCategory::count() }}
      </div>
      <div>
        <div class="form-group mb-0">
          <input type="text" class="form-row" placeholder="Search">
        </div>
      </div>
    </div>

      @if ($products == null || count($products) == 0)

        <div class="table-responsive bg-white">
          <table class="table table-hover mb-0">
            <thead>
              <tr style="color:#888888;">
                <th class="o-heading">Category</th>
                <th class="o-heading">Products</th>
                <th class="o-heading text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productCategories as $productCategory)
                <tr>
                  <td wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )" role="button">
                      {{ $productCategory->name }}
                  </td>
                  <td>
                    {{ count($productCategory->products) }}
                  </td>
                  <td class="text-right">
                    <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-danger px-2 py-1" wire:click="">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{-- Pagination links --}}
        <div class="bg-white border p-2">
          {{ $productCategories->links() }}
        </div>
      @endif
    </div>
  @endif


</div>

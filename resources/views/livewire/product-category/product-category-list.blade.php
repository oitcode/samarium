<div>


  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <div class="">

    {{-- Filter div --}}
    <div class="d-flex justify-content-between bg-white my-2 p-2">
      <div class="d-flex flex-column justify-content-center">
        Total product categories: {{ \App\ProductCategory::count() }}
      </div>
      <div>
        <div class="form-group mb-0">
          <input type="text" class="form-row" placeholder="Search">
        </div>
      </div>
    </div>

    {{-- Filter div --}}
    <div class="d-flex justify-content-between bg-white mt-2 p-2">
      <div class="d-flex flex-column justify-content-center">
        <div>
          Displaying <span class="text-success font-weight-bold">all</span> product categories
        </div>
      </div>
    </div>

      @if ($products == null || count($products) == 0)

        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
              <tr style="color:#888888; text-shadow: 1px 0 #000; letter-spacing:1px; font-weight:bold;">
                <th>Category</th>
                <th>Products</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productCategories as $productCategory)
                <tr>
                  <td wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )" role="button">
                    <strong>
                      {{ $productCategory->name }}
                    </strong>
                  </td>
                  <td>
                    {{ count($productCategory->products) }}
                  </td>
                  <td>
                    @if (true)
                    <button class="btn btn-primary px-2 py-1" wire:click="">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger px-2 py-1" wire:click="">
                      <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-success px-2 py-1" wire:click="" style="{{-- background-color: #ac0; --}}">
                      <i class="fas fa-eye"></i>
                    </button>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  @endif


</div>

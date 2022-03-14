<div class="card w-100">
  <div class="card-body p-0">
  @foreach ($productCategories as $productCategory)
    <div class="mb-3">
      <h2 class="p-3">
        {{ $productCategory->name }}
      </h2>
      <button href="" class="btn text-primary border-primary rounded-circle ml-3"
        wire:click="$emit('updateProductCategory', {{ $productCategory->product_category_id }})">
        <i class="fas fa-pencil-alt"></i>
      </button>
    </div>

    @if (count($productCategory->products) > 0)
      <div class="table-responsive">
        <table class="table table-striped table-hover" style="font-size: 1.3rem;">
          @if (false)
          <thead>
            <tr>
              <th>
                Item
              </th>
              <th>
                Price
              </th>
              <th>
              </th>
            </tr>
          </thead>
          @endif
          <tbody>
            @foreach ($productCategory->products as $product)
              <tr>
                <td>
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 100px; height: 100px;">
                  {{ $product->name }}
                </td>
                <td>
                  Rs
                  {{ $product->selling_price }}
                </td>
                <td>
                  <button href="" class="btn text-primary border-primary rounded-circle"
                    wire:click="$emit('updateProduct', {{ $product->product_id }})">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="text-secondary p-3">
        No products in this category
      </div>
    @endif

  @endforeach
  </div>
</div>

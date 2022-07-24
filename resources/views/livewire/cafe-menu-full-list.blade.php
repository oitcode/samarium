<div class="card w-100">
  <div class="card-body p-0">
  @foreach ($productCategories as $productCategory)
    <div class="">
      <div class="d-flex bg-warning">
        <h2 class="p-3">
          {{ $productCategory->name }}
        </h2>
        <div class="h-10 d-flex flex-column justify-content-center">
          <button href="" class="btn text-primary border-primary rounded-circle ml-3"
            wire:click="$emit('updateProductCategory', {{ $productCategory->product_category_id }})">
            <i class="fas fa-pencil-alt"></i>
          </button>
        </div>
      </div>
    </div>

    @if (count($productCategory->products) > 0)
      <div class="table-responsive">
        <table class="table table-striped table-hover" style="">
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
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                </td>
                <td>
                  {{ $product->name }}
                </td>
                <td class="font-weight-bold">
                  Rs
                  @php echo number_format( $product->selling_price ); @endphp
                </td>
                <td>


                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog text-secondary"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" wire:click="$emit('updateProduct', {{ $product->product_id }})">
                        <i class="fas fa-pencil-alt text-primary mr-2"></i>
                        Update
                      </button>
                      <button class="dropdown-item" wire:click="">
                        <i class="fas fa-trash text-danger mr-2"></i>
                        Delete
                      </button>

                    </div>
                  </div>




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

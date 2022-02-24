<div class="mb-5 border bg-light">
  @if (false)
  <h1 class="h4">
    Add Item
  </h1>
  @endif

  <div class="table-responsive m-0">
    <table class="table table-bordered m-0">
      <thead>
        <tr class="bg-success text-white" style="font-size: 1.3rem;">
          <th>Search Item</th>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>

      <tbody>
        <tr class="p-0 font-weight-bold" style="height: 60px; font-size: 1.3rem;">
          <td class="p-0 h-100">
            <input class="m-0 w-100 h-100 border-0" type="text" wire:model.defer="add_item_name" wire:keydown.enter="updateProductList"/>
          </td>
          <td class="p-0 h-100">
            @if (true)
            <select class="w-100 h-100 custom-control border-0" wire:model.defer="product_id" wire:change="selectItem">
              <option>---</option>

              @foreach ($products as $product)
                <option value="{{ $product->product_id }}">
                  {{ $product->name }}
                </option>
              @endforeach
            </select>
            @endif
          </td>
          <td>
            {{ $price }}
          </td>
          <td class="p-0 h-100">
            <input class="w-100 h-100 font-weight-bold border-0" type="text" wire:model.defer="quantity" wire:keydown.enter="updateTotal"/>
          </td>
          <td>
            {{ $total }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="p-3 m-0" style="background-image: linear-gradient(to right, white, #abc);">
    <div class="row">
      <div class="col-md-8">
        <button class="btn btn-lg btn-success mr-3" wire:click="addItemToSeatTableBooking" style="width: 120px; height: 80px; font-size: 1.3rem;">
          Add
        </button>

        <button class="btn btn-lg btn-danger" wire:click="resetInputFields" style="width: 120px; height: 80px; font-size: 1.3rem;">
          Cancel
        </button>
      </div>
      @if ($selectedProduct != null)
        <div class="col-md-4" style="height: 50px;">
          <div class="float-right">
            <img src="{{ asset('storage/' . $selectedProduct->image_path) }}" class="img-fluid" style="height: 80px;">
          </div>
          <div class="clearfix">
          </div>
        </div>
      @endif
    </div>

  </div>

</div>

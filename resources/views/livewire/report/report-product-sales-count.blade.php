<div>
  <h2 class="h4 mt-4 mb-5">
    Product sales count
  </h2>

  {{-- Date bar --}}
  <div class="my-3 text-secondary" style="font-size: 1.3rem;">

    <input type="date" wire:model="startDate" class="mr-3" />
    <input type="date" wire:model="endDate" class="mr-3" />

  </div>

  {{-- Product bar --}}
  <div class="d-flex flex-wrap my-3" style="font-size: 1.1rem;">

      <div class="mr-3">
        <label>Category</label>
        <select class="custom-control" wire:model="search_product_category_id" wire:change="updateProducts">
          <option>---</option>
          @foreach ($productCategories as $productCategory)
            <option value="{{ $productCategory->product_category_id }}">
              {{ $productCategory->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mr-3">
        <label>Product</label>
        <select class="custom-control"
            wire:model="search_product_id"
            >
          <option>---</option>
          @foreach ($products as $product)
            <option value="{{ $product->product_id }}">
              {{ $product->name }}
            </option>
          @endforeach
        </select>
      </div>

  </div>

  {{-- Go button --}}
  <div class="my-3">
    <button class="btn btn-success" wire:click="getCount">
      Go
    </button>
    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>


  @if ($todayItems && count($todayItems) > 0)
    <div class="table-responsive">
      <table class="table table-bordered table-hover" style="font-size: 1.3rem;">
        <thead>
          <tr class="bg-success text-white">
            <th>
              Item
            </th>
            <th>
              Quantity
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($todayItems as $item)
              <tr>
                <td>
                  {{ $item['product']->name }}
                </td>
                <td>
                  {{ $item['quantity'] }}
                </td>
              <tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

</div>

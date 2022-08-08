<div>

  @if ($modes['productDetail'])
    @livewire ('inventory-product-detail', ['product' => $displayingProduct,])
  @else
    {{-- Simple list --}}
    <div class="table-responsive bg-white border">
      <table class="table table-sm table-hover mb-0">
        <thead>
          <tr class="
              {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              "
              style="">
            <th colspan="2">Item</th>
            <th>Inventory Unit</th>
            <th>Inventory low</th>
            <th>Used today</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($products as $product)
            @if ($product->stock_applicable == 'yes')
              <tr class="">
                <td style="width: 50px;">
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                </td>
                <td class="font-weight-bold">
                  {{ $product->name }}
                </td>
                <td>
                  {{ $product->inventory_unit }}
                </td>
                <td>
                  @if ($product->stock_count <= $product->stock_notification_count)
                    <i class="fas fa-exclamation-circle text-danger mr-3"></i>
                  @else
                  @endif
                </td>
                <td>
                  @if ($product->isUsedToday())
                    <i class="fas fa-check-circle text-success"></i>
                  @else
                    <i class="fas fa-times-circle text-danger"></i>
                  @endif
                </td>
                <td>
                  {{ $product->stock_count }}
                  {{ $product->inventory_unit }}
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog text-secondary"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" wire:click="displayProductDetail({{ $product }})">
                        <i class="fas fa-file text-primary mr-2"></i>
                        View
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  @endif

</div>

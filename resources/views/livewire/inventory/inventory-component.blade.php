<div>


  @if ($modes['productList'] || !array_search(true, $modes))
  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Inventory">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>
  @endif

  @if ($modes['productDetail'])
    @livewire ('inventory-product-detail', ['product' => $displayingProduct,])
  @elseif (true || $modes['productList'])
    {{-- Simple list --}}
    <div class="table-responsive bg-white border">
      <table class="table table-sm table-hover mb-0">
        <thead>
          <tr class="">
            <th colspan="2" class="o-heading">Item</th>
            <th class="o-heading">Inventory Unit</th>
            <th class="o-heading">Inventory low</th>
            <th class="o-heading">Used today</th>
            <th class="o-heading">Stock</th>
          </tr>
        </thead>

        <tbody>
          @if (count($products) > 0)
            @foreach ($products as $product)
              @if ($product->stock_applicable == 'yes')
                <tr wire:click="displayProductDetail({{ $product }})" role="button">
                  <td style="width: 50px;">
                    @if ($product->image_path)
                      <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                    @else
                      <i class="fas fa-dice-d6 fa-2x text-secondary" style="width: 35px; height: 35px;"></i>
                    @endif
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
                      <i class="fas fa-times-circle text-muted"></i>
                    @endif
                  </td>
                  <td>
                    {{ $product->stock_count }}
                    {{ $product->inventory_unit }}
                  </td>
                </tr>
              @endif
            @endforeach
          @else
            <tr>
              <td colspan="6">
                <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No product added to inventory tracking.
                <p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  @endif


</div>

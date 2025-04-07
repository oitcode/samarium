<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total products: {{ $totalProductCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Product ID
      </th>
      <th>
        Name
      </th>
      <th>
        Active status
      </th>
      <th>
        Selling price
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($products as $product)
        <x-table-row-component>
          <td>
            {{ $product->product_id }}
          </td>
          <td class="h6" wire:click="$dispatch('displayProduct', { productId : {{ $product->product_id }} })" role="button">
            {{ \Illuminate\Support\Str::limit($product->name, 60, $end=' ...') }}
          </td>
          <td class="h6 font-weight-bold">
            @if ($product->is_active == 1)
              <span class="badge badge-pill badge-success">
                Active
              </span>
            @else
              <span class="badge badge-pill badge-danger">
                Inactive
              </span>
            @endif
          </td>
          <td>
            {{ config('app.transaction_currency_symbol') }}
            {{ $product->selling_price }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
            <div class="d-md-none">
              <x-list-dropdown-component toolbarButtonDropdownId="productListProductDropdown-{{ $product->product_id }}">
                <x-toolbar-dropdown-item-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
                  View
                </x-toolbar-dropdown-item-component>
              </x-list-dropdown-component>
            </div>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $products->links() }}
    </x-slot>
  </x-list-component>

</div>

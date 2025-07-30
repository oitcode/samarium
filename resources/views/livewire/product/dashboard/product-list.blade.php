<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="mr-5 pt-2 pl-md-2 mb-3 mb-md-0">
          Product list
        </div>
        <div class="d-flex">
          <input type="text" class="form-control mr-2" placeholder="Search"/>
          <button class="btn btn-light border">Search</button>
        </div>
      </div>
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
          <x-table-cell>
            {{ $product->product_id }}
          </x-table-cell>
          <x-table-cell>
            {{ \Illuminate\Support\Str::limit($product->name, 60, $end=' ...') }}
          </x-table-cell>
          <td class="h6 font-weight-bold">
            @if ($product->is_active == 1)
              <span class="badge-pill o-heading py-2 px-3 bg-success text-white">
                ACTIVE
              </span>
            @else
              <span class="badge-pill o-heading py-2 px-3 bg-danger text-white">
                INACTIVE
              </span>
            @endif
          </td>
          <td>
            {{ config('app.transaction_currency_symbol') }}
            {{ $product->selling_price }}
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingProduct->product_id == $product->product_id)
                <button class="btn btn-danger mr-1" wire:click="deleteProduct">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteProduct">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingProduct->product_id == $product->product_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Product cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteProduct">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteProduct({{ $product->product_id }})">
            </x-list-delete-button-component>
            @if (false)
            <div class="d-md-none">
              <x-list-dropdown-component toolbarButtonDropdownId="productListProductDropdown-{{ $product->product_id }}">
                <x-toolbar-dropdown-item-component clickMethod="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
                  View
                </x-toolbar-dropdown-item-component>
              </x-list-dropdown-component>
            </div>
            @endif
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $products->links() }}
    </x-slot>
  </x-list-component>

</div>

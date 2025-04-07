<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Product search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          wire:model="product_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>


  @if ($searchDone)
  <x-list-component>
    <x-slot name="listInfo">
      Total: {{ count($products) }}
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
      @if ($products != null && count($products) > 0)
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
            </td>
          </x-table-row-component>
        @endforeach
      @else
        <td>
          No results
        </td>
      @endif
    </x-slot>

    <x-slot name="listPaginationLinks">
    @if (false)
      {{ $products->links() }}
    @endif
    </x-slot>
  </x-list-component>
  @endif

</div>

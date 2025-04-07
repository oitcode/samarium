<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Product vendor search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          wire:model="product_vendor_search_name"
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
      Total: {{ count($productVendors) }}
    </x-slot>
  
    <x-slot name="listHeadingRow">
      <th>Vendor</th>
      <th>Products</th>
      <th class="text-right">Action</th>
    </x-slot>
  
    <x-slot name="listBody">
      @foreach ($productVendors as $productVendor)
        <x-table-row-component>
          <td wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )" role="button">
              {{ $productVendor->name }}
          </td>
          <td>
            {{ count($productVendor->products) }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayProductVendor', { productVendorId: {{ $productVendor->product_vendor_id }} } )">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayProductVendor', { productVendorId: {{ $productVendor->product_vendor_id }} } )">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>
  
    <x-slot name="listPaginationLinks">
    </x-slot>
  </x-list-component>
  @endif

</div>

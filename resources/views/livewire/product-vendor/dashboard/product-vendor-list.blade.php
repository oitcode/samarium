<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total product vendors: {{ $totalProductVendorCount }}
    </x-slot>
    <x-slot name="listHeadingRow">
      <th>Product Vendor</th>
      <th class="text-right">Action</th>
    </x-slot>
  
    <x-slot name="listBody">
      @foreach ($productVendors as $productVendor)
        <x-table-row-component>
          <td wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )" role="button">
            {{ $productVendor->name }}
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
      {{ $productVendors->links() }}
    </x-slot>
  </x-list-component>

</div>

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
            @if ($modes['confirmDelete'])
              @if ($deletingProductVendor->product_vendor_id == $productVendor->product_vendor_id)
                <button class="btn btn-danger mr-1" wire:click="deleteProductVendor">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteProductVendor">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingProductVendor->product_vendor_id == $productVendor->product_vendor_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Product vendor cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteProductVendor">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayProductVendor', { productVendorId: {{ $productVendor->product_vendor_id }} } )">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayProductVendor', { productVendorId: {{ $productVendor->product_vendor_id }} } )">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteProductVendor({{ $productVendor->product_vendor_id }})">
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

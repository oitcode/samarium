<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total product vendors: {{ \App\ProductVendor::count() }}
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
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>
  
    <x-slot name="listPaginationLinks">
      {{ $productVendors->links() }}
    </x-slot>
  </x-list-component>

</div>

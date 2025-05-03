<div>

  {{--
    Product Category List View
    
    This template displays the list of product categories with action buttons.
    Used by the ProductCategoryList Livewire component.
  --}}

  <x-list-component>
    <x-slot name="listInfo">
      Total product categories: {{ $totalProductCategoryCount }}
    </x-slot>
  
    {{-- Table header --}}
    <x-slot name="listHeadingRow">
      <th>Category</th>
      <th>Products</th>
      <th class="text-right">Action</th>
    </x-slot>
  
    <x-slot name="listBody">
      @foreach ($productCategories as $productCategory)
        <x-table-row-component>
          <td wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )" role="button">
              {{ $productCategory->name }}
          </td>
          <td>
            {{ count($productCategory->products) }}
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingProductCategory->product_category_id == $productCategory->product_category_id)
                <button class="btn btn-danger mr-1" wire:click="deleteProductCategory">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteProductCategory">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingProductCategory->product_category_id == $productCategory->product_category_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Product category cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteProductCategory">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayProductCategory', { productCategoryId: {{ $productCategory->product_category_id }} } )">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayProductCategory', { productCategoryId: {{ $productCategory->product_category_id }} } )">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteProductCategory({{ $productCategory->product_category_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>
  
    {{-- Pagination --}}
    <x-slot name="listPaginationLinks">
      {{ $productCategories->links() }}
    </x-slot>
  </x-list-component>

</div>

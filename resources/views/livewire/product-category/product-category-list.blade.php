<div class="">

  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <x-list-component>
      <x-slot name="listInfo">
        Total product categories: {{ $totalProductCategoryCount }}
      </x-slot>
    
      <x-slot name="listHeadingRow">
        <th>Category</th>
        <th>Products</th>
        <th class="text-right">Action</th>
      </x-slot>
    
      <x-slot name="listBody">
        @foreach ($oproductCategories as $productCategory)
          <x-table-row-component>
            <td wire:click="$dispatch('displayProductCategory', { productCategory: {{ $productCategory }} } )" role="button">
                {{ $productCategory->name }}
            </td>
            <td>
              {{ count($productCategory->products) }}
            </td>
            <td class="text-right">
              <x-list-edit-button-component clickMethod="$dispatch('displayProductCategory', { productCategoryId: {{ $productCategory->product_category_id }} } )">
              </x-list-edit-button-component>
              <x-list-view-button-component clickMethod="$dispatch('displayProductCategory', { productCategoryId: {{ $productCategory->product_category_id }} } )">
              </x-list-view-button-component>
              <x-list-delete-button-component clickMethod="">
              </x-list-delete-button-component>
            </td>
          </x-table-row-component>
        @endforeach
      </x-slot>
    
      <x-slot name="listPaginationLinks">
        {{ $oproductCategories->links() }}
      </x-slot>
    </x-list-component>
  @endif

</div>

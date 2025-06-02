<div class="p-md-0">
  
  <x-base-component moduleName="Product Category">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['list'] || ! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])
      @endif

      @if ($modes['list'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="productCategoryToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['create'])
        @livewire ('product-category.dashboard.product-category-create')
      @elseif ($modes['list'])
        @livewire ('product-category.dashboard.product-category-list')
      @elseif ($modes['search'])
        @livewire ('product-category.dashboard.product-category-search')
      @elseif ($modes['display'])
        @livewire ('product-category.dashboard.product-category-display', ['productCategory' => $displayingProductCategory,])
      @else
        @livewire ('product-category.dashboard.product-category-list')
      @endif

    </div>
  </x-base-component>

</div>

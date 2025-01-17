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
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['create'])
        @livewire ('product-category.product-category-create')
      @elseif ($modes['list'])
        @livewire ('product-category.product-category-list')
      @elseif ($modes['display'])
        @livewire ('product-category.product-category-display', ['productCategory' => $displayingProductCategory,])
      @else
        @livewire ('product-category.product-category-list')
      @endif

    </div>
  </x-base-component>


</div>

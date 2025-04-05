<div>
  
  <x-base-component moduleName="Product question">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      <x-toolbar-dropdown-component toolbarButtonDropdownId="productQuestionToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['list'])
        @livewire ('product.dashboard.product-question-list')
      @elseif ($modes['display'])
        @livewire ('product.dashboard.product-question-display', ['productQuestion' => $displayingProductQuestion,])
      @else
        @livewire ('product.dashboard.product-question-list')
      @endif

    </div>
  </x-base-component>

</div>

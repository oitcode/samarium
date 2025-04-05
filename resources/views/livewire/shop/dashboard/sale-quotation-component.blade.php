<div>
  
  <x-base-component moduleName="Sale quotation">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listSaleQuotationMode'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createSaleQuotationMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'createSaleQuotationMode',
        ])
      @endif

      <x-toolbar-dropdown-component toolbarButtonDropdownId="saleQuotationToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['createSaleQuotationMode'])
        @livewire ('sale-quotation.dashboard.sale-quotation-create')
      @elseif ($modes['listSaleQuotationMode'])
        @livewire ('sale-quotation.dashboard.sale-quotation-list')
      @elseif ($modes['searchSaleQuotationMode'])
        @livewire ('sale-quotation.dashboard.sale-quotation-search')
      @elseif ($modes['displaySaleQuotationMode'])
        @livewire ('sale-quotation.dashboard.sale-quotation-work', ['saleQuotation' => $displayingSaleQuotation,])
      @else
        @livewire ('sale-quotation.dashboard.sale-quotation-list')
      @endif

    </div>
  </x-base-component>

</div>

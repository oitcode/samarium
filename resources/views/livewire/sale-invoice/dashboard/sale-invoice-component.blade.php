<div>
  
  <x-base-component moduleName="Sales">

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
        <x-toolbar-dropdown-component toolbarButtonDropdownId="saleInvoiceToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('sale-invoice.dashboard.sale-invoice-create')
      @elseif ($modes['display'])
        @if ($displayingSaleInvoice->creation_status == 'progress')
          @livewire ('sale-invoice.dashboard.sale-invoice-work', ['saleInvoice' => $displayingSaleInvoice,])
        @else
          @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice, 'exitDispatchEvent' => 'exitSaleInvoiceDisplay',])
        @endif
      @elseif ($modes['list'])
        @livewire ('sale-invoice.dashboard.sale-invoice-list')
      @elseif ($modes['search'])
        @livewire ('sale-invoice.dashboard.sale-invoice-search')
      @else
        @livewire ('sale-invoice.dashboard.sale-invoice-list')
      @endif

    </div>
  </x-base-component>

</div>

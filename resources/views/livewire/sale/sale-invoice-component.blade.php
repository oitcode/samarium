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
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('sale.sale-invoice-create')
      @elseif ($modes['display'])
        @if ($displayingSaleInvoice->payment_status == 'paid')
          @livewire ('core.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
        @else
          @livewire ('sale.sale-invoice-work', ['saleInvoice' => $displayingSaleInvoice,])
        @endif
      @elseif ($modes['list'])
        @livewire ('sale.sale-invoice-list')
      @elseif ($modes['search'])
        @livewire ('sale.sale-invoice-search')
      @else
        @livewire ('sale.sale-invoice-list')
      @endif

    </div>
  </x-base-component>


</div>

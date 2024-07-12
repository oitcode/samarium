<div class="p-3-rm p-md-0">


    <div>
      @if ($modes['list'] || !array_search(true, $modes))
      {{-- Toolbar --}}
      <x-toolbar-classic toolbarTitle="Sales">

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])

        @if (false)
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'list',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('search')",
            'btnIconFaClass' => 'fas fa-search',
            'btnText' => 'Search',
            'btnCheckMode' => 'search',
        ])

        @if ($modes['display'])
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('display')",
              'btnIconFaClass' => 'fas fa-circle',
              'btnText' => 'Sale invoice display',
              'btnCheckMode' => 'display',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-times',
            'btnText' => '',
            'btnCheckMode' => '',
        ])
        @endif

        @include ('partials.dashboard.spinner-button')

      </x-toolbar-classic>
      @endif

    </div>


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

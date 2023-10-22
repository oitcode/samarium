<div class="p-3 p-md-0">


  <div class="mb-3">

    <div>
      {{-- Toolbar --}}
      <x-toolbar-classic toolbarTitle="Sales">
        @include ('partials.dashboard.spinner-button')

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'list',
        ])

        @if ($modes['display'])
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('display')",
              'btnIconFaClass' => 'fas fa-circle',
              'btnText' => 'Takeaway display',
              'btnCheckMode' => 'display',
          ])
        @endif

        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-refresh',
            'btnText' => '',
            'btnCheckMode' => '',
        ])

      </x-toolbar-classic>

    </div>
  </div>


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['create'])
    @livewire ('takeaway-create')
  @elseif ($modes['display'])
    @if ($displayingTakeaway && $displayingTakeaway->status == 'closed')
      @livewire ('core-sale-invoice-display', ['saleInvoice' => $displayingTakeaway->saleInvoice,])
    @else
      @livewire ('sale-invoice-work', ['saleInvoice' => $displayingTakeaway->saleInvoice,])
    @endif
  @elseif ($modes['list'])
    @livewire ('takeaway-list')
  @else
  @endif


</div>

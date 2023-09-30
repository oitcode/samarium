<div class="p-3 p-md-0">

  <div class="mb-3">

    <div class="d-flex-rm">
      {{-- Show in bigger screens --}}
      <x-toolbar-classic toolbarTitle="Sales">
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
            'btnIconFaClass' => 'fas fa-eraser',
            'btnText' => 'Clear modes',
            'btnCheckMode' => '',
        ])

        @include ('partials.dashboard.spinner-button')
      </x-toolbar-classic>

      {{-- Show in smaller screens --}}
      <div class="d-flex d-md-none">
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
        @include ('partials.dashboard.spinner-button')
        <div class="clearfix">
        </div>
      </div>

    </div>
  </div>

  {{-- Use required component as per mode --}}
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
    @if (false)
    Welcome
    @endif
  @endif
</div>

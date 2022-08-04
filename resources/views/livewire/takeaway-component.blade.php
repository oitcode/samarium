<div class="p-3 p-md-0">
  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">

    <div class="d-flex">
      {{-- Show in bigger screens --}}
      <div class="d-none d-md-flex">
        @include ('partials.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
        ])

        @include ('partials.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
        ])
      </div>

      {{-- Show in smaller screens --}}
      <div class="d-flex d-md-none">
        @include ('partials.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
        ])

        @include ('partials.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('list')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
        ])
      </div>

      @include ('partials.spinner-button')

      <div class="clearfix">
      </div>
    </div>
  </div>
  @endif

  {{-- Use required component as per mode --}}
  @if ($modes['create'])
    @livewire ('takeaway-create')
  @elseif ($modes['display'])
    @if ($displayingTakeaway && $displayingTakeaway->status == 'closed')
      @livewire ('core-sale-invoice-display', ['saleInvoice' => $displayingTakeaway->saleInvoice,])
    @else
      @livewire ('sale-invoice-work', ['saleInvoice' => $displayingTakeaway->saleInvoice,])
    @endif
  @else
    @livewire ('takeaway-list')
  @endif
</div>

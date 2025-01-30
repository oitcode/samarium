<div>
  
  <x-base-component moduleName="Purchase">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['list'] || !array_search(true, $modes))
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
        @livewire ('purchase.purchase-create')
      @elseif ($modes['list'])
        @livewire ('purchase.purchase-list')
      @elseif ($modes['display'])
        @if ($displayingPurchase->creation_status == 'progress')
          @livewire ('purchase.purchase-create', [
              'createNew' => false,
              'purchase' => $displayingPurchase,
          ])
        @else
          @livewire ('core.core-purchase-display', ['purchase' => $displayingPurchase,])
        @endif
      @elseif ($modes['search'])
        @livewire ('purchase.purchase-search')
      @else
        @livewire ('purchase.purchase-list')
      @endif

    </div>
  </x-base-component>

</div>

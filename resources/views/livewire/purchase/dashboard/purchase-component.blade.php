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

      @if ($modes['list'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="purchaseToolbarDropdown">
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
        @livewire ('purchase.dashboard.purchase-editor')
      @elseif ($modes['list'])
        @livewire ('purchase.dashboard.purchase-list')
      @elseif ($modes['display'])
        @if ($displayingPurchase->creation_status == 'progress')
          @livewire ('purchase.dashboard.purchase-editor', [
              'createNew' => false,
              'purchase' => $displayingPurchase,
          ])
        @else
          {{-- Basic info --}}
          <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
            <div class="h2 o-heading o-linear-gradient-text-color">
              {{ $displayingPurchase->purchase_id }}
            </div>
          </div>
          @livewire ('core.dashboard.core-purchase-display', ['purchase' => $displayingPurchase,])
        @endif
      @elseif ($modes['search'])
        @livewire ('purchase.dashboard.purchase-search')
      @else
        @livewire ('purchase.dashboard.purchase-list')
      @endif

    </div>
  </x-base-component>

</div>

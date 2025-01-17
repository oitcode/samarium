<div>

  
  <x-base-component moduleName="Online order">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['onlineOrderDisplay'])
        @livewire ('online-order.dashboard.online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
      @elseif ($modes['listMode'])
        @livewire ('online-order.dashboard.online-order-list')
      @elseif ($modes['searchMode'])
        @livewire ('online-order.dashboard.online-order-search')
      @else
        @livewire ('online-order.dashboard.online-order-list')
      @endif

    </div>
  </x-base-component>


</div>

<div>

  
  <x-base-component moduleName="Online order">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listMode'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('listMode')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'listMode',
        ])
      @endif

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('searchMode')",
          'btnIconFaClass' => 'fas fa-search',
          'btnText' => 'Search',
          'btnCheckMode' => 'searchMode',
      ])

      @if ($modes['onlineOrderDisplay'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('onlineOrderDisplay')",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Online order display',
            'btnCheckMode' => 'onlineOrderDisplay',
        ])
      @endif

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
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
      @endif

    </div>
  </x-base-component>


</div>

<div class="p-3 p-md-0">


  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Weborder">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

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
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @elseif ($modes['listMode'])
    @livewire ('online-order-list')
  @elseif ($modes['searchMode'])
    @livewire ('online-order-search')
  @endif


</div>

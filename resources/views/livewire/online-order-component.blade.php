<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Weborder">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
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

    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  {{-- Use required component as per mode --}}
  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @elseif ($modes['listMode'])
    @livewire ('online-order-list')
  @endif
</div>

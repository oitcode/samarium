<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">

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

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">

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

  {{-- Use required component as per mode --}}
  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @else
    @livewire ('online-order-list')
  @endif
</div>

<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Purchase">
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
          'btnText' => 'Purchase display',
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

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">
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

  {{-- Use the required component as per mode --}}
  @if ($modes['create'])
    @livewire ('purchase-create')
  @elseif ($modes['list'])
    @livewire ('purchase-list')
  @elseif ($modes['display'])
    @if ($displayingPurchase->creation_status == 'progress')
      @livewire ('purchase-create', [
          'createNew' => false,
          'purchase' => $displayingPurchase,
      ])
    @else
      @livewire ('core-purchase-display', ['purchase' => $displayingPurchase,])
    @endif
  @endif

</div>

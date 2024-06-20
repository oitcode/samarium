<div class="p-3 p-md-0">


  {{-- Toolbar --}}
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

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('search')",
        'btnIconFaClass' => 'fas fa-search',
        'btnText' => 'Search',
        'btnCheckMode' => 'search',
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
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>


  {{--
     |
     | Use required component as per mode
     |
  --}}

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
  @elseif ($modes['search'])
    @livewire ('purchase-search')
  @endif


</div>

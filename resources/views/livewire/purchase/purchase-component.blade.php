<div class="p-3-rm p-md-0">

  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Purchase">

    @include ('partials.dashboard.spinner-button')

    @if ($modes['list'] || !array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('create')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'create',
      ])
    @endif

    @if (false)
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
    @endif

  </x-toolbar-classic>


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

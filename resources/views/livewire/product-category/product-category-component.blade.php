<div>


  @if ($modes['list'] || !array_search(true, $modes))
  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Product category">
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
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Product category display',
          'btnCheckMode' => 'display',
      ])
    @endif

    @if (false)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
    @endif

  </x-toolbar-classic>
  @endif


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message-modal', ['message' => session('message'),])
  @endif


  {{--
  |
  | Use required component as per mode.
  |
  --}}

  @if ($modes['create'])
    @livewire ('product-category.product-category-create')
  @elseif ($modes['list'])
    @livewire ('product-category.product-category-list')
  @elseif ($modes['display'])
    @livewire ('product-category.product-category-display', ['productCategory' => $displayingProductCategory,])
  @endif


</div>

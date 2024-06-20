<div>


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

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>


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
    @livewire ('cafe-menu-product-category-create')
  @elseif ($modes['list'])
    @livewire ('cafe-menu-list')
  @elseif ($modes['display'])
    @livewire ('cafe-menu.product-category-display', ['productCategory' => $displayingProductCategory,])
  @endif


</div>

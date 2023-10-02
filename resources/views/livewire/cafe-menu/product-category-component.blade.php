<div>
  {{--
  |
  | Toolbar
  |
  | Top toolbar of the component.
  |
  --}}

  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Product category">
    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Category',
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
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  {{-- Use required component as per mode --}}
  @if ($modes['create'])
    @livewire ('cafe-menu-product-category-create')
  @elseif ($modes['list'])
    @livewire ('cafe-menu-list')
  @elseif ($modes['display'])
    @livewire ('cafe-menu.product-category-display', ['productCategory' => $displayingProductCategory,])
  @endif
</div>

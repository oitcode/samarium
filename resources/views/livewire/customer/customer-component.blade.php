<div class="p-3-rm p-md-0">


  @if ($modes['list'] || !array_search(true, $modes))
  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Customer">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'create',
    ])

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
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Customer display',
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

    @include ('partials.dashboard.spinner-button')

  </x-toolbar-classic>
  @endif


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-danger border" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['create'])
    @livewire ('customer.customer-create')
  @elseif ($modes['list'])
    @livewire ('customer.customer-list')
  @elseif ($modes['search'])
    @livewire ('customer.customer-search')
  @elseif ($modes['display'])
    @livewire ('customer.customer-detail', ['customer' => $displayingCustomer,])
  @else
    @livewire ('customer.customer-list')
  @endif


</div>

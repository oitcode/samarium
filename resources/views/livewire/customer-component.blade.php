<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">
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


  {{-- Use required component as per mode --}}
  @if ($modes['create'])
    @livewire ('customer-create')
  @elseif ($modes['list'])
    @livewire ('customer-list')
  @elseif ($modes['display'])
    @livewire ('customer-detail', ['customer' => $displayingCustomer,])
  @else
    <div class="row" style="margin: auto;">
      <div class="col-md-2 shadow-sm p-0 mr-5 mb-4">
        @include ('partials.flash-card-simple', [
            'fcCardColor' => 'bg-light text-dark',
            'fcTitle' => 'Customers',
            'fcData' => $totalCustomers,
            'fcIconFaClass' => 'fas fa-users',
        ])
      </div>
      <div class="col-md-2 shadow-sm p-0 mr-5 mb-4">
        @include ('partials.flash-card-simple', [
            'fcCardColor' => 'bg-danger text-white',
            'fcTitle' => 'Debtors',
            'fcData' => $totalDebtors,
            'fcIconFaClass' => 'fas fa-exclamation-circle',
        ])
      </div>
    </div>
  @endif

</div>

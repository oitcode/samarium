<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">
    <button class="btn
        @if ($modes['create'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;"
        wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;"
        wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

    <div class="clearfix">
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">
    <button class="btn
        @if ($modes['create'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.3rem;"
        wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.3rem;"
        wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button wire:loading class="btn m-0"
        style="font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

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

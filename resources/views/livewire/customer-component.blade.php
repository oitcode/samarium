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

    @if (false)
    <div class="d-inline-block float-right">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondary"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="font-size: 1rem;">
          <button class="dropdown-item py-2" wire:click="">
            <i class="fas fa-plus-circle text-primary mr-2"></i>
            Todo
          </button>
        </div>
      </div>
    </div>
    @endif

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
      <div class="col-md-3 shadow-sm p-0 mr-5 mb-4">
        <div class="card">
          <div class="card-body p-0 bg-success text-white">
            <div class="d-flex w-100">
              <div class="p-3">
                <h2 class="mb-4" style="font-size: 1.3rem;">Customers</h2>
                <h2>{{ $totalCustomers }}</h2>
              </div>
              <div class="d-flex justify-content-center w-50">
                <div class="d-flex flex-column justify-content-center">
                  <i class="fas fa-users fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 shadow-sm p-0 mr-5 mb-4">
        <div class="card">
          <div class="card-body p-0 bg-danger text-white">
            <div class="d-flex w-100">
              <div class="p-3">
                <h2 class="mb-4" style="font-size: 1.3rem;">Debtors</h2>
                <h2>{{ $totalDebtors }}</h2>
              </div>
              <div class="d-flex justify-content-center w-50">
                <div class="d-flex flex-column justify-content-center">
                  <i class="fas fa-exclamation-circle fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

</div>

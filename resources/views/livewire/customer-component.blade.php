<div class="p-3 p-md-0">

  <div class="mb-3">
    <button class="btn
        @if ($modes['create'])
          btn-success
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;"
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
        style="height: 75px; width: 150px; font-size: 1.3rem;"
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

  @if ($modes['create'])
    @livewire ('customer-create')
  @elseif ($modes['list'])
    @livewire ('customer-list')
  @elseif ($modes['display'])
    @livewire ('customer-detail', ['customer' => $displayingCustomer,])
  @else
    <div class="row" style="margin: auto;">
      <div class="col-md-3 shadow-sm p-0 mr-5">
        <div class="card">
          <div class="card-body p-0">
            <div class="d-flex w-100">
              <div class="p-3">
                <h2 class="text-secondary mb-4" style="font-size: 1.3rem;">Customers</h2>
                <h2>{{ $totalCustomers }}</h2>
              </div>
              <div class="d-flex justify-content-center w-50">
                <div class="d-flex flex-column justify-content-center">
                  <i class="fas fa-users fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 shadow-sm p-0 mr-5">
        <div class="card">
          <div class="card-body p-0">
            <div class="d-flex w-100">
              <div class="p-3">
                <h2 class="text-secondary mb-4" style="font-size: 1.3rem;">Debtors</h2>
                <h2>{{ $totalDebtors }}</h2>
              </div>
              <div class="d-flex justify-content-center w-50">
                <div class="d-flex flex-column justify-content-center">
                  <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

</div>

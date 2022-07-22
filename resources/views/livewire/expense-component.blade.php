<div class="p-3 p-md-0">
  <!-- Menu tool bar -->

  {{-- Show in bigger screens --}}
  <div class="mb-3-0 d-none d-md-block">
    <button class="btn
        @if ($modes['create'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1.1rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1.1rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn
        @if ($modes['createCategory'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1.1rem;" wire:click="enterMode('createCategory')">
      <i class="fas fa-plus-circle mr-3"></i>
      Category
    </button>

    <button class="btn
        @if ($modes['report'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1.1rem;" wire:click="enterMode('report')">
      <i class="fas fa-paper-plane mr-3"></i>
      Report
    </button>

    @if (false)
    <button class="btn btn-primary-rm m-0 float-right border-rm bg-white-rm text-primary-rm d-none d-md-block"
        wire:click="clearModes"
        style="font-size: 1.3rem;">
      <i class="fas fa-wrench mr-3"></i>
      Expense
    </button>
    @endif

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
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="font-size: 1rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button wire:loading class="btn m-0"
        style="font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

    <div class="d-inline-block float-right">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondary"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="font-size: 1rem;">
          <button class="dropdown-item py-2" wire:click="enterMode('createCategory')">
            <i class="fas fa-plus-circle text-primary mr-2"></i>
            New category
          </button>
          <button class="dropdown-item py-2" wire:click="enterMode('report')">
            <i class="fas fa-paper-plane text-primary mr-2"></i>
            Report
          </button>
        </div>
      </div>
    </div>

    <div class="clearfix">
    </div>
  </div>
  <!-- ./Menu tool bar -->

  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  @if ($modes['create'])
    {{--
    @livewire ('expense-create')
    --}}
    @livewire ('expense-create-new')
  @elseif ($modes['list'])
    @livewire ('expense-list')
  @elseif ($modes['display'])
    @livewire ('expense-display', ['expense' => $displayingExpense,])
  @elseif ($modes['report'])
    @livewire ('expense-report')
  @elseif ($modes['createCategory'])
    @livewire ('expense-category-create')
  @endif

</div>

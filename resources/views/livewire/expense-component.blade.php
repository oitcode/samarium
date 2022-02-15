<div class="">
  <h3 class="">
    Expense
  </h3>

  <!-- Menu tool bar -->
  <div class="bg-light border p-2">
  
    <div class="float-left mr-3">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart text-secondary mr-2"></i>
          Expense
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" wire:click="enterCreateMode">
            <i class="fas fa-plus text-secondary mr-2"></i>
            Create
          </button>
          <button class="dropdown-item" wire:click="enterListMode">
            <i class="fas fa-list text-secondary mr-2"></i>
            List
          </button>
        </div>
      </div>
    </div>
  
    <div class="float-left mr-3">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-folder text-secondary mr-2"></i>
          Expense category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" wire:click="enterCategoryCreateMode">
            <i class="fas fa-plus text-secondary mr-2"></i>
            Create
          </button>
          <button class="dropdown-item" wire:click="enterCategoryListMode">
            <i class="fas fa-list text-secondary mr-2"></i>
            List
          </button>
        </div>
      </div>
    </div>

    <div class="float-left mr-3">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chart-area text-secondary mr-2"></i>
          Report
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <button class="dropdown-item" wire:click="enterReportMode">
            <i class="fas fa-chart-area text-secondary mr-2"></i>
            View report
          </button>
        </div>
      </div>
    </div>

    <div class="float-right mr-3">
      <button class="btn text-danger" wire:click="$emit('exitDisplay')">
        <i class="fas fa-times mr-2"></i>
        Close
      </button>
    </div>
  
    <div class="float-right mr-3">
      <button class="btn text-secondary" wire:click="$refresh">
        <i class="fas fa-sync mr-2 text-primary"></i>
        Refresh
      </button>
    </div>

    <div class="float-right mr-3" wire:loading>
      <div class="spinner-border text-primary" role="status">
      </div>
      <span>Loading ...</span>
    </div>

  
    <div class="clearfix">
    </div>
  </div>
  <!-- ./Menu tool bar -->

  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  @if ($categoryCreateMode)
    @livewire ('expense-category-create')
  @elseif ($categoryListMode)
    @livewire ('expense-category-list')
  @elseif ($createMode)
    @livewire ('expense-create')
  @elseif ($listMode)
    @livewire ('expense-list')
  @elseif ($reportMode)
    @livewire ('chart-expense-by-category')
  @endif

</div>

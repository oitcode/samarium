<div class="">
  <!-- Menu tool bar -->
  <div class="mb-3">
    <button class="btn btn-success m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn btn-success m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn btn-success m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      <i class="fas fa-chart-line mr-3"></i>
      Report
    </button>

    <button class="btn btn-success m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      <i class="fas fa-search mr-3"></i>
      Search
    </button>

    <button class="btn btn-warning m-0 float-right"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      Expense
    </button>
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
  @elseif ($reportMode)
    @livewire ('chart-expense-by-category')
  @else
    @livewire ('expense-list')
  @endif

</div>

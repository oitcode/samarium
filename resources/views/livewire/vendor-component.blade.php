<div>

  <div class="mb-3">
    <button class="btn
        @if ($modes['create'])
          btn-success text-white
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success text-white
        @else
          bg-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    @if (false)
    <button class="btn m-0 bg-white border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="">
      <i class="fas fa-chart-line mr-3"></i>
      Report
    </button>

    <button class="btn m-0 bg-white border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="">
      <i class="fas fa-search mr-3"></i>
      Search
    </button>
    @endif

    <button class="btn btn-success-rm m-0 float-right border-rm"
        wire:click="clearModes"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <i class="fas fa-truck mr-3"></i>
      Vendors
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
    @livewire ('vendor-create')
  @elseif ($modes['display'])
    @livewire ('vendor-display', ['vendor' => $displayingVendor,])
  @elseif ($modes['list'])
    @livewire ('vendor-list')
  @endif

</div>

<div class="p-3 p-md-0">

  @if (! $modes['create'] && ! $modes['display'])
  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">
    <button class="btn
        @if ($modes['create'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    @if (false)
    <button class="btn btn-success-rm m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="">
      <i class="fas fa-chart-line mr-3"></i>
      Report
    </button>

    <button class="btn btn-success-rm m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="">
      <i class="fas fa-search mr-3"></i>
      Search
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
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['list'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.1rem;" wire:click="enterMode('list')">
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
  @endif

  @if ($modes['create'])
    @livewire ('purchase-create')
  @elseif ($modes['list'])
    @livewire ('purchase-list')
  @elseif ($modes['display'])
    @if ($displayingPurchase->creation_status == 'progress')
      @livewire ('purchase-create', [
          'createNew' => false,
          'purchase' => $displayingPurchase,
      ])
    @else
      @if (false)
      @livewire ('purchase-display', ['purchase' => $displayingPurchase,])
      @endif
      @livewire ('core-purchase-display', ['purchase' => $displayingPurchase,])
    @endif
  @endif

</div>

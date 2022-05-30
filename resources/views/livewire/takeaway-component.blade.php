<div>
  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">
    <button class="btn border shadow-sm m-0 badge-pill" style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>
    <button class="btn
        m-0 border shadow-sm badge-pill mr-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('list')">
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

    <button class="btn btn-success m-0 float-right"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <i class="fas fa-shipping-fast mr-3"></i>
      Takeaway
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
    @livewire ('takeaway-create')
  @elseif ($modes['display'])
    @livewire ('takeaway-work', ['takeaway' => $displayingTakeaway,])
  @else
    @livewire ('takeaway-list')
  @endif
</div>

<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">

    <button class="btn
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

  {{-- Show in smaller screens --}}
  <div class="mb-3 d-md-none">

    <button class="btn
        m-0 border shadow-sm badge-pill mr-3"
        style="font-size: 1.3rem;" wire:click="enterMode('list')">
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

  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @else
    @livewire ('online-order-list')
  @endif
</div>

<div>
  @if (true)
  <div class="mb-3">
    <button class="btn btn-success badge-pill m-0 border shadow-sm" style="" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-1"></i>
      New webpage
    </button>

    <button class="btn btn-success-rm m-0 border shadow-sm" style="" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn btn-warning m-0 float-right"
        style=""
        wire:click="enterCreateMode">
      Webpages
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
    @livewire ('ecs.webpage-create')
  @elseif ($modes['display'])
    @livewire ('cms.webpage-display', ['webpage' => $displayingWebpage,])
  @else
    @livewire ('ecs.webpage-list')
  @endif
</div>

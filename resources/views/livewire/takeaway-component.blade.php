<div>
  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">
    <button class="btn btn-success m-0 badge-pill" style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>
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

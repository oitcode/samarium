<div>
  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">
    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus mr-3"></i>
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

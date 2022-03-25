<div>
  <div class="mb-3">
    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus mr-3"></i>
      New
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('viewJournalEntry')">
      <i class="fas fa-plus mr-3"></i>
      Journal
    </button>
  </div>

  @if ($modes['create'])
    @livewire ('accounting-account-create')
  @elseif ($modes['viewJournalEntry'])
    @livewire ('journal-entry-list')
  @else
    @livewire ('accounting-account-list')
  @endif
</div>

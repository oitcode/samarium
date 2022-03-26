<div>
  <div class="mb-3">
    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      @if (false)
      <i class="fas fa-plus mr-3"></i>
      @endif
      New Account
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('viewJournalEntry')">
      @if (false)
      <i class="fas fa-plus mr-3"></i>
      @endif
      Journal
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('viewJournalEntry')">
      @if (false)
      <i class="fas fa-plus mr-3"></i>
      @endif
      Ledger
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('trialBalance')">
      @if (false)
      <i class="fas fa-plus mr-3"></i>
      @endif
      Trial Balance
    </button>
  </div>

  @if ($modes['create'])
    @livewire ('accounting-account-create')
  @elseif ($modes['viewJournalEntry'])
    @livewire ('journal-entry-list')
  @elseif ($modes['displayLedger'])
    @livewire ('ledger-display', ['abAccount' => $displayingLedgerAbAccount,])
  @elseif ($modes['trialBalance'])
    @livewire ('accounting-trial-balance-component')
  @else
    @livewire ('accounting-account-list')
  @endif
</div>

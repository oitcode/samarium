<div>

  {{-- Top tool bar --}}
  <div class="mb-3 border bg-white shadow">

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonAccount" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
          style="font-size: 1rem;"
      >
        Accounts
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonAccount">

        <button class="dropdown-item" wire:click="enterMode('list')" style="font-size: 1rem;">
          <i class="fas fa-list text-primary mr-2"></i>
          Chart of accounts
        </button>

        <button class="dropdown-item" wire:click="enterMode('create')" style="font-size: 1rem;">
          <i class="fas fa-plus-circle text-primary mr-2"></i>
          Create new
        </button>

      </div>
    </div>

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonBooks" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
          style="font-size: 1rem;"
      >
        Books
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonBooks">
        <button class="dropdown-item" wire:click="enterMode('journal')" style="font-size: 1rem;">
          <i class="fas fa-file text-primary mr-2"></i>
          Journal
        </button>
        <button class="dropdown-item" wire:click="enterMode('ledger')" style="font-size: 1rem;">
          <i class="fas fa-file text-primary mr-2"></i>
          Ledger
        </button>
      </div>
    </div>

    <button class="btn btn-light m-0 mr-0 p-3" style="font-size: 1rem;" wire:click="enterMode('trialBalance')">
      Trial Balance
    </button>

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonStatements" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
          style="font-size: 1rem;"
      >
        Statements
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonStatements">
        <button class="dropdown-item" wire:click="enterMode('incomeStatement')" style="font-size: 1rem;">
          <i class="fas fa-file text-primary mr-2"></i>
          Income statement
        </button>
        <button class="dropdown-item" wire:click="enterMode('balanceSheet')" style="font-size: 1rem;">
          <i class="fas fa-file text-primary mr-2"></i>
          Balance sheet
        </button>
        <button class="dropdown-item" wire:click="enterMode('cashFlow')" style="font-size: 1rem;">
          <i class="fas fa-file text-primary mr-2"></i>
          Cash flow
        </button>
      </div>
    </div>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  @if ($modes['create'])
    @livewire ('accounting-account-create')
  @elseif ($modes['journal'])
    @livewire ('accounting-journal-book')
  @elseif ($modes['ledger'])
    @livewire ('accounting-ledger-book')
  @elseif ($modes['trialBalance'])
    @livewire ('accounting-trial-balance-component')
  @elseif ($modes['list'])
    @livewire ('accounting-account-list')
  @elseif ($modes['incomeStatement'])
    @livewire ('accounting-income-statement')
  @elseif ($modes['balanceSheet'])
    @livewire ('accounting-balance-sheet')
  @elseif ($modes['cashFlow'])
    @livewire ('accounting-cash-flow')
  @endif
</div>

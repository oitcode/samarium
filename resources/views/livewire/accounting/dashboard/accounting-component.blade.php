<div>

  {{-- Top tool bar --}}
  <div class="mb-3 border bg-white shadow">
    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonAccount" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" 
      >
        Accounts
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonAccount">

        <button class="dropdown-item" wire:click="enterMode('list')">
          <i class="fas fa-list text-primary mr-2"></i>
          Chart of accounts
        </button>

        <button class="dropdown-item" wire:click="enterMode('create')">
          <i class="fas fa-plus-circle text-primary mr-2"></i>
          Create new
        </button>

      </div>
    </div>

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonBooks" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
      >
        Books
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonBooks">
        <button class="dropdown-item" wire:click="enterMode('journal')">
          <i class="fas fa-file text-primary mr-2"></i>
          Journal
        </button>
        <button class="dropdown-item" wire:click="enterMode('ledger')">
          <i class="fas fa-file text-primary mr-2"></i>
          Ledger
        </button>
      </div>
    </div>

    <button class="btn btn-light m-0 mr-0 p-3" wire:click="enterMode('trialBalance')">
      Trial Balance
    </button>

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonStatements" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
      >
        Statements
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonStatements">
        <button class="dropdown-item" wire:click="enterMode('incomeStatement')">
          <i class="fas fa-file text-primary mr-2"></i>
          Income statement
        </button>
        <button class="dropdown-item" wire:click="enterMode('balanceSheet')">
          <i class="fas fa-file text-primary mr-2"></i>
          Balance sheet
        </button>
        <button class="dropdown-item" wire:click="enterMode('cashFlow')">
          <i class="fas fa-file text-primary mr-2"></i>
          Cash flow
        </button>
      </div>
    </div>

    <div class="dropdown d-inline mr-0">
      <button class="btn btn-light dropdown-toggle p-3" type="button"
          id="dropdownMenuButtonMore" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"
      >
        More
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMore">
        <button class="dropdown-item" wire:click="enterMode('accountTypeList')">
          <i class="fas fa-list text-primary mr-2"></i>
          List account types
        </button>
        <button class="dropdown-item" wire:click="enterMode('accountTypeCreate')">
          <i class="fas fa-plus-circle text-primary mr-2"></i>
          Create account type
        </button>
      </div>
    </div>
    @include ('partials.dashboard.spinner-button')
  </div>

  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['create'])
    @livewire ('accounting.dashboard.accounting-account-create')
  @elseif ($modes['journal'])
    @livewire ('accounting.dashboard.accounting-journal-book')
  @elseif ($modes['ledger'])
    @livewire ('accounting.dashboard.accounting-ledger-book')
  @elseif ($modes['trialBalance'])
    @livewire ('accounting.dashboard.accounting-trial-balance-component')
  @elseif ($modes['list'])
    @livewire ('accounting.dashboard.accounting-account-list')
  @elseif ($modes['incomeStatement'])
    @livewire ('accounting.dashboard.accounting-income-statement')
  @elseif ($modes['balanceSheet'])
    @livewire ('accounting.dashboard.accounting-balance-sheet')
  @elseif ($modes['cashFlow'])
    @livewire ('accounting.dashboard.accounting-cash-flow')
  @elseif ($modes['accountTypeList'])
    @livewire ('accounting.dashboard.accounting-account-type-list')
  @elseif ($modes['accountTypeCreate'])
    @livewire ('accounting.dashboard.accounting-account-type-create')
  @endif
</div>

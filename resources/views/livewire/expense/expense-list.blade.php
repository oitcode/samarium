<div>

  @if (false)
    {{-- Show in bigger screens --}}
    <div class="mt-1 mb-1 py-2 text-secondary d-none d-md-block bg-white">
      <div class="d-flex">
        <div class="mt-0 text-secondary mr-3">
          <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setPreviousDay">
            <i class="fas fa-arrow-left"></i>
          </button>
          <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setNextDay">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
        <div>
          <input type="date" wire:model="startDate" class="mr-3" />
          <input type="date" wire:model="endDate" class="mr-3" />
          <button class="btn {{ config('app.oc_ascent_btn_color') }} mr-3" wire:click="getExpensesForDateRange">
            Go
          </button>
        </div>

        @include ('partials.dashboard.spinner-button')

        <div class="d-flex justify-content-end flex-grow-1">
          <div class="pl-2 font-weight-bold pr-3 py-2 bg-white">
            <span class="text-dark">
            {{ config('app.transaction_currency') }}
            @php echo number_format( $total, 2 ); @endphp
            </span>
          </div>
        </div>
      </div>
    </div>

    {{-- Show in smaller screens --}}
    <div class="mb-3 text-secondary d-md-none">
      <div class="mt-0 text-secondary mr-3">
        <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setPreviousDay">
          <i class="fas fa-arrow-left"></i>
        </button>
        <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setNextDay">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
      <div>
        <input type="date" wire:model="startDate" class="mr-3" />
        <input type="date" wire:model="endDate" class="mr-3" />
        <button class="btn {{ config('app.oc_ascent_btn_color') }} mr-3" wire:click="getExpensesForDateRange">
          Go
        </button>
      </div>
      @include ('partials.dashboard.spinner-button')
      <div class="d-flex flex-grow-1">
        <div class="pl-2 font-weight-bold pr-3 border py-2 bg-white">
          <span class="text-dark">
          {{ config('app.transaction_currency') }}
          @php echo number_format( $total, 2 ); @endphp
          </span>
        </div>
      </div>
    </div>
  @endif

  <x-list-component>
    <x-slot name="listInfo">
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">ID</th>
      <th class="d-none d-md-table-cell">Date</th>
      <th class="d-none d-md-table-cell">Expense</th>
      <th class="d-none d-md-table-cell">Amount</th>
      <th class="d-none d-md-table-cell text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($expenses as $expense)
        {{-- Show in bigger screens --}} 
        <x-table-row-component bsClass="d-none d-md-table-row" wire:key="{{ rand() * $expense->expense_id }}">
          <td>
            {{ $expense->expense_id }}
          </td>
          <td>
            {{ $expense->date }}
          </td>
          <td>
            @foreach ($expense->expenseItems as $expenseItem)
              {{ $expenseItem->name }}
            @endforeach
          </td>
          <td>
            {{ config('app.transaction_currency') }}
            @php echo number_format( $expense->getTotalAmount(), 2 ); @endphp
          </td>
          <td class="text-right">
            @if (true)
              <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayExpense', {expense: {{ $expense }} })">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayExpense', {expense: {{ $expense }} })">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                <i class="fas fa-trash"></i>
              </button>
            @endif
          </td>
        </x-table-row-component>

        {{-- Show in smaller screens --}}
        <x-table-row-component bsClass="d-md-none" wire:key="{{ rand() }}">
          <td>
            {{ $expense->expense_id }}
            <div>
              {{ $expense->date }}
            </div>
          </td>
          <td class="font-weight-bold">
            {{ config('app.transaction_currency') }}
            @php echo number_format( $expense->amount, 2 ); @endphp
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog text-secondary"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" wire:click="">
                  <i class="fas fa-file text-primary mr-2"></i>
                  View
                </button>
                <button class="dropdown-item" wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                  <i class="fas fa-trash text-danger mr-2"></i>
                  Delete
                </button>
              </div>
            </div>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $expenses->links() }}
    </x-slot>
  </x-list-component>

  @if ($modes['confirmDeleteExpense'])
    @livewire ('expense-list-expense-delete-confirm', ['expense' => $deletingExpense,])
  @endif

</div>

<div>

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
            @if (count($expense->expenseItems) > 0)
              @foreach ($expense->expenseItems as $expenseItem)
                {{ $expenseItem->name }}
              @endforeach
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td>
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format( $expense->getTotalAmount(), 2 ); @endphp
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingExpense->expense_id == $expense->expense_id)
                <button class="btn btn-danger mr-1" wire:click="deleteExpense">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteExpense">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingExpense->expense_id == $expense->expense_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Expense cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteExpense">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayExpense', {expenseId: {{ $expense->expense_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayExpense', {expenseId: {{ $expense->expense_id }} })">
            </x-list-view-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $expenses->links() }}
    </x-slot>
  </x-list-component>

</div>

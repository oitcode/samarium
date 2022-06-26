<div>

  <div class="mt-3 text-secondary py-3" style="font-size: 1.3rem;">

    <input type="date" wire:model.defer="startDate" class="mr-3" />
    <input type="date" wire:model.defer="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="getExpensesForDateRange">
      Go
    </button>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  <div class="mt-0 text-secondary py-3" style="font-size: 1.3rem;">
    <button class="btn btn-success" wire:click="setPreviousDay">
      <i class="fas fa-arrow-left"></i>
    </button>
    <button class="btn btn-success" wire:click="setNextDay">
      <i class="fas fa-arrow-right"></i>
    </button>
  </div>

  <div class="my-4 pl-2 font-weight-bold" style="font-size: 1rem;">
    <span style="font-size: 1.3rem;">
    Total: Rs
    @php echo number_format( $total ); @endphp
    </span>
  </div>

  @if (!is_null($expenses) && count($expenses) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive bg-white d-none d-md-block">
      <table class="table border mb-0" style="font-size: 1.1rem;">
        <thead>
          <tr class="bg-success-rm text-white-rm">
            <th>ID</th>
            <th>Date</th>
            <th>Expense</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
  
        <tbody>
          @foreach($expenses as $expense)
          <tr>
            <td>
              {{ $expense->expense_id }}
            </td>
  
            <td class="" style="font-size: 1rem;">
              {{ $expense->date }}
            </td>
  
            <td>
              {{ $expense->name }}
            </td>
  
            <td>
              {{ $expense->expenseCategory->name }}
            </td>
  
            <td>
              @php echo number_format( $expense->amount ); @endphp
            </td>
  
            <td>
              @if (false)
              <button class="btn p-2 border rounded-circle mr-3" 
                  wire:click="">
                <i class="fas fa-folder-open text-primary"></i>
              </button>
              <button class="btn p-2 border rounded-circle mr-3"
                  wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                <i class="fas fa-trash text-danger"></i>
              </button>
              @endif

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
  
          </tr>
          @endforeach
        </tbody>
  
        <tfoot>
          <tr style="font-size: 1.8rem;">
            <th colspan="4" class="text-right mr-3">
              Total
            </th>
            <td>
              @php echo number_format( $total ); @endphp
            </td>
            <td>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>

    {{-- Show in smaller screens --}}
    <div class="table-responsive bg-white d-md-none">
      <table class="table border mb-0">
  
        <tbody>
          @foreach($expenses as $expense)
          <tr>
            <td>
              {{ $expense->expense_id }}
              <div>
                {{ $expense->date }}
              </div>
            </td>
  
            <td>
              <div class="font-weight-bold" style="font-size: 0.9rem;">
              {{ $expense->name }}
              <div>
                <span class="badge badge-pill badge-primary">
                  {{ $expense->expenseCategory->name }}
                </span>
              </div>
            </td>
  
            <td class="font-weight-bold" style="font-size: 1rem;">
              Rs
              @php echo number_format( $expense->amount ); @endphp
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
  
          </tr>
          @endforeach
        </tbody>
  
        <tfoot>
          <tr style="font-size: 1.1rem;">
            <th colspan="2" class="text-right mr-3">
              Total
            </th>
            <td>
              Rs
              @php echo number_format( $total ); @endphp
            </td>
            <td>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @else
    <div class="pl-3 text-muted">
      No expenses
    </div>
  @endif

  @if ($modes['confirmDeleteExpense'])
    @livewire ('expense-list-expense-delete-confirm', ['expense' => $deletingExpense,])
  @endif
</div>

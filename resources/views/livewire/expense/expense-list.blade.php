<div>

  {{-- Show in bigger screens --}}
  <div class="mt-2-rm mb-3 text-secondary py-3-rm d-flex-rm bg-warning-rm d-none d-md-block bg-white">
    <div class="d-flex">
      <div class="mt-0 text-secondary py-3-rm mr-3">
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

      <button wire:loading class="btn">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>
      <div class="d-flex justify-content-end flex-grow-1">
        <div class="pl-2 font-weight-bold pr-3 py-2 bg-white">
          <span class="text-dark">
          Rs
          @php echo number_format( $total, 2 ); @endphp
          </span>
        </div>
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="mt-2-rm mb-3 text-secondary py-3-rm  bg-warning-rm d-md-none">
    <div class="mt-0 text-secondary py-3-rm mr-3">
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

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
    <div class="d-flex flex-grow-1">
      <div class="pl-2 font-weight-bold pr-3 border py-2 bg-white">
        <span class="text-dark">
        Rs
        @php echo number_format( $total, 2 ); @endphp
        </span>
      </div>
    </div>
  </div>

  @if (!is_null($expenses) && count($expenses) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive bg-white d-none d-md-block">
      <table class="table border mb-0">
        <thead>
          <tr class="
              {{ config('app.oc_ascent_bg_color', 'bg-success') }}
              {{ config('app.oc_ascent_text_color', 'text-white') }}
              "
          >
            <th>ID</th>
            <th>Date</th>
            <th>Expense</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
  
        <tbody>
          @foreach($expenses as $expense)
          <tr wire:key="{{ rand() * $expense->expense_id }}" wire:click="$dispatch('displayExpense', {expense: {{ $expense }} })" role="button">
            <td>
              {{ $expense->expense_id }}
            </td>
  
            <td class="">
              {{ $expense->date }}
            </td>
  
            <td>
              @foreach ($expense->expenseItems as $expenseItem)
                {{ $expenseItem->name }}
              @endforeach
            </td>
  
            <td>
              @php echo number_format( $expense->getTotalAmount(), 2 ); @endphp
            </td>
  
            <td>
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="enterConfirmDeleteExpenseMode({{ $expense }})">
                  <i class="fas fa-trash"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayExpense', {expense: {{ $expense }} })">
                  <i class="fas fa-eye"></i>
                </button>
              @endif
            </td>
  
          </tr>
          @endforeach
        </tbody>
  
        <tfoot>
          <tr>
            <th colspan="3" class="text-right mr-3">
              Total
            </th>
            <td>
              @php echo number_format( $total, 2 ); @endphp
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
          <tr wire:key="{{ rand() }}">
            <td>
              {{ $expense->expense_id }}
              <div>
                {{ $expense->date }}
              </div>
            </td>
  
            <td class="font-weight-bold">
              Rs
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
  
          </tr>
          @endforeach
        </tbody>
  
        <tfoot>
          <tr>
            <th colspan="2" class="text-right mr-3">
              Total
            </th>
            <td>
              Rs
              @php echo number_format( $total, 2 ); @endphp
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

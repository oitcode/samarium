<div class="card">
  <div class="card-body p-0">
  
    @if (!is_null($expenses) && count($expenses) > 0)
      <table class="table table-hover table-valign-middle">
        <thead>
          <tr class="bg-light text-secondary border-top">
            <th class="text-info">Date</th>
            <th class="text-info">Expense</th>
            <th class="text-info">Category</th>
            <th class="text-info">Amount</th>
            <th class="text-info">Action</th>
          </tr>
        </thead>
  
        <tbody>
          @foreach($expenses as $expense)
          <tr>
            <td>
              {{ $expense->date }}
            </td>

            <td>
              <a class="text-dark" href="" wire:click.prevent="$emit('displayExpense', {{ $expense }})">
                {{ $expense->name }}
              </a>
            </td>

            <td>
              {{ $expense->expenseCategory->name }}
            </td>

            <td>
              {{ $expense->amount }}
            </td>
  
            <td>
              <span class="btn btn-tool btn-sm mr-2" wire:click="$emit('updateExpense', {{ $expense}})">
                <i class="fas fa-pencil-alt text-primary"></i>
              </span>
              <span class="btn btn-tool btn-sm" wire:click="$emit('confirmDeleteExpense', {{ $expense }})">
                <i class="fas fa-trash text-danger"></i>
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="p-2 text-muted">
        No expense categories.
      </div>
    @endif
  
  </div>
</div>

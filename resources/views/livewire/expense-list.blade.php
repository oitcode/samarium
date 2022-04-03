<div class="card">
  <div class="card-body p-0">
  
    @if (!is_null($expenses) && count($expenses) > 0)
      <table class="table table-hover table-valign-middle" style="font-size: 1.3rem;">
        <thead>
          <tr class="bg-success-rm text-white-rm">
            <th>Date</th>
            <th>Expense</th>
            <th>Category</th>
            <th>Amount</th>
          </tr>
        </thead>
  
        <tbody>
          @foreach($expenses as $expense)
          <tr wire:click.prevent="$emit('displayExpense', {{ $expense }})" role="button">
            <td>
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
  
          </tr>
          @endforeach
        </tbody>

        <tfoot>
          <tr style="font-size: 1.8rem;">
            <th colspan="3" class="text-right mr-3">
              Total
            </th>
            <td>
              @php echo number_format( $total ); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    @else
      <div class="p-2 text-muted">
        No expenses
      </div>
    @endif
  
  </div>
</div>

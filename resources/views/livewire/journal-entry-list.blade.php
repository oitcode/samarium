<div>
  <div class="table-responsive">
    <table class="table table-bordered table-striped-rm" style="font-size: 1.3rem;">
      <thead>
        <tr class="bg-success text-white">
          <th>Date</th>
          <th>Particulars</th>
          <th>LF</th>
          <th>Debit</th>
          <th>Credit</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($journalEntries as $journalEntry)
          @php
            $previousJEI = null;
          @endphp
          @foreach ($journalEntry->journalEntryItems as $journalEntryItem)
            <tr>
              <td>
                @if ($previousJEI == null || $previousJEI->journalEntry->journal_entry_id != $journalEntryItem->journalEntry->journal_entry_id)
                  {{ $journalEntry->date }}
                @endif
                @php
                  $needToShow = false;
                @endphp
              </td>

              <td>
                @if ($journalEntryItem->type == 'credit')
                  To
                @endif
                {{ $journalEntryItem->abAccount->name }} A/c
              </td>

              <td>
              </td>

              <td>
                @if ($journalEntryItem->type == 'debit')
                  {{ $journalEntryItem->amount }}
                @endif
              </td>

              <td>
                @if ($journalEntryItem->type == 'credit')
                  {{ $journalEntryItem->amount }}
                @endif
              </td>
            </tr>
            @php
              $previousJEI = $journalEntryItem;
            @endphp
          @endforeach
        @endforeach
      </tbody>

      <tfoot>
      </tfoot>
    </table>
  </div>
</div>

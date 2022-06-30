<div>

  {{-- Date picker --}}
  <div class="my-3 px-3 text-secondary" style="font-size: 1.3rem;">

    <input type="date" wire:model.defer="startDate" class="mr-3" />
    <input type="date" wire:model.defer="endDate" class="mr-3" />

  </div>


  {{-- Journal entry table --}}
  <div class="table-responsive bg-white">
    <table class="table table-sm table-bordered table-striped-rm mb-0" style="font-size: 1rem;">
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

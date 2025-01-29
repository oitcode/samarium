<div>
  <h2 class="my-4">
    {{ $abAccount->name }}
    A/c 
    Ledger book
  </h2>

  <div class="table-responsive bg-white">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Date</th>
          <th>Particulars</th>
          <th>Journal Entry ID</th>
          <th>Amount ID</th>
          <th>Date</th>
          <th>Particulars</th>
          <th>Journal Entry ID</th>
          <th>Amount ID</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ledgerEntries as $ledgerEntry)
          <tr>
            @if ($ledgerEntry->type == 'debit')
              <td>
                {{ $ledgerEntry->date }}
              </td>
              <td>
                {{ $ledgerEntry->particulars }}
              </td>
              <td>
                {{ $ledgerEntry->journalEntry->journal_entry_id }}
              </td>
              <td>
                {{ $ledgerEntry->amount }}
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
            @elseif ($ledgerEntry->type == 'credit')
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
                {{ $ledgerEntry->date }}
              </td>
              <td>
                {{ $ledgerEntry->particulars }}
              </td>
              <td>
                {{ $ledgerEntry->journalEntry->journal_entry_id }}
              </td>
              <td>
                {{ $ledgerEntry->amount }}
              </td>
            @else
              WHOOPS
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

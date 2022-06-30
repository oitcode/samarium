<div class="border bg-white">

  <div class="p-3">
    <h1 class="h4 text-primary">
      Ledger
    </h1>
  </div>

  <div class="p-3">
    <div class="form-group">
      <label>Account</label>
      <select class="custom-select" wire:model.defer="selected_account_id">
        <option>---</option>
        @foreach ($abAccounts as $abAccount)
          <option value="{{ $abAccount->ab_account_id }}">
            {{ $abAccount->name }}
          </option>
        @endforeach
      </select>
      @error('parent_account_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3">
      <button type="submit" class="btn btn-success" style="font-size: 1rem;" wire:click="selectAbAccount">
        Go
      </button>
    </div>
  </div>

  @if (! is_null($selectedAbAccount))
    <div>
      <h2 class="my-4 mx-3 text-primary">
        {{ $selectedAbAccount->name }}
        A/c 
      </h2>
    
      <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
          <thead>
            <tr class="bg-success text-white">
              <th>Date</th>
              <th>Particulars</th>
              <th>Journal Entry ID</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Particulars</th>
              <th>Journal Entry ID</th>
              <th>Amount</th>
            </tr>
          </thead>
    
          <tbody>
            @foreach ($selectedAbAccount->ledgerEntries as $ledgerEntry)
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

          <tfoot>
            <tr class="border">
              <th colspan="3">Total</th>
              <td class="font-weight-bold">
                {{ $debitTotal }}
              </td>
              <td colspan="3" class="border-0">
              </td>
              <td class="font-weight-bold">
                {{ $creditTotal }}
              </td>
            </tr>

            <tr class="border">
              <th colspan="3">Opening balance</th>
              <td class="font-weight-bold">
                0
              </td>
              <td colspan="3" class="border-0">
              </td>
              <td>
              </td>
            </tr>
            <tr class="border">
              <th colspan="3">Closing balance</th>
              <td class="font-weight-bold">
                @if ($closingBalance >= 0)
                  {{ $closingBalance }}
                @endif
              </td>
              <td colspan="3" class="border-0">
              </td>
              <td class="font-weight-bold">
                @if ($closingBalance < 0)
                  {{ $closingBalance * -1 }}
                @endif
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  @else
    <div class="p-3 text-muted">
      Select an account
    </div>
  @endif

</div>

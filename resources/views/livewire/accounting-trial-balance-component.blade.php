<div>

  @php
    $debitBalance = 0;
    $creditBalance = 0;
  @endphp

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Account</th>
          <th>Debit Balance</th>
          <th>Credit Balance</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($abAccounts as $account)
          <tr>
            <td>
              {{ $account->name }}
            </td>
            <td>
              @if ($account->hasDebitBalance())
                {{ $account->getLedgerBalance() }}

                @php
                  $debitBalance += $account->getLedgerBalance();
                @endphp

              @endif
            </td>
            <td>
              @if ($account->hasCreditBalance())
                {{ $account->getLedgerBalance() * (-1) }}

                @php
                  $creditBalance += $account->getLedgerBalance() * (-1);
                @endphp

              @endif
            </td>
          </tr>

        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th>
            TOTAL
          </th>
          <td>
            {{ $debitBalance }}
          </td>
          <td>
            {{ $creditBalance }}
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

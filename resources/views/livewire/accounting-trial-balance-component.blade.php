<div>

  <div class="my-4 text-center">
    <h1>
      {{ $company->name }}
    </h1>
    <h2>
      Unadjusted Trial Balance
    </h2>
    <h2>
      {{ \Carbon\Carbon::now()->toDateString() }}
    </h2>
  </div>

  @php
    $debitBalance = 0;
    $creditBalance = 0;
  @endphp

  <div class="table-responsive" style="font-size: 1.3rem;">
    <table class="table table-bordered bg-white">
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
          <td class="font-weight-bold">
            {{ $debitBalance }}
          </td>
          <td class="font-weight-bold">
            {{ $creditBalance }}
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<div class="border bg-white">

  <div class="p-3">
    <h1 class="h4 text-primary">
      Trial Balance
    </h1>
    <h2 class="h5">
      {{ $company->name }}
    </h2>
    <h2 class="h6">
      {{ \Carbon\Carbon::now()->toDateString() }}
    </h2>
  </div>

  @php
    $debitBalance = 0;
    $creditBalance = 0;
  @endphp

  <div class="table-responsive" style="font-size: 1rem;">
    <table class="table table-bordered bg-white mb-0">
      <thead>
        <tr class="border bg-success text-white" style="border-width: 10px;">
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

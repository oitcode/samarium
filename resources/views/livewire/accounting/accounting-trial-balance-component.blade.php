<div class="border bg-white-rm">

  <div class="p-3 mt-3 mb-4">
    <h1 class="h4 text-primary">
      Trial Balance
    </h1>
    <h2 class="h5">
      {{ $company->name }}
    </h2>
    <h2 class="h6">
      {{ \Carbon\Carbon::now()->format('d F Y') }}
    </h2>
  </div>

  @php
    $debitBalance = 0;
    $creditBalance = 0;
  @endphp

  <div class="table-responsive">
    <table class="table table-bordered table-striped bg-white mb-0">
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
                @php echo number_format( $account->getLedgerBalance() ); @endphp

                @php
                  $debitBalance += $account->getLedgerBalance();
                @endphp

              @endif
            </td>
            <td>
              @if ($account->hasCreditBalance())
                @php echo number_format( $account->getLedgerBalance() * (-1) ); @endphp

                @php
                  $creditBalance += $account->getLedgerBalance() * (-1);
                @endphp

              @endif
            </td>
          </tr>

        @endforeach
      </tbody>

      <tfoot>
        <tr class="bg-primary-rm text-white-rm" style="background-color: #efe;">
          <th>
            Total
          </th>
          <td class="font-weight-bold">
            @php echo number_format( $debitBalance ); @endphp
          </td>
          <td class="font-weight-bold">
            @php echo number_format( $creditBalance ); @endphp
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

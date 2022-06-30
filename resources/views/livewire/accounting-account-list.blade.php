<div>
  <div class="table-responsive bg-white border">
    <table class="table table-striped table-bordered mb-0" style="font-size: 1.1rem;">
      <thead>
        <tr class="bg-success text-white">
          <th></th>
          <th>Acc ID</th>
          <th>Account</th>
          <th>Account type</th>
          <th>Balance</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($abAccounts as $abAccount)
          <tr>
            <td style="width: 5vw;">
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$emit('displayAbAccountLedger', {{ $abAccount->ab_account_id }})">
                    <i class="fas fa-folder text-primary mr-2"></i>
                    Ledger
                  </button>
                </div>
              </div>
            </td>
            <td>
              {{ $abAccount->ab_account_id }}
            </td>
            <td>
              {{ $abAccount->name }}
            </td>
            <td>
            </td>
            <td>
              <span class="text-muted mr-1" style="font-size: 0.9rem;">
              Rs
              </span>
              {{ $abAccount->getLedgerBalance() }}
            </td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
      </tfoot>
    </table>
  </div>
</div>

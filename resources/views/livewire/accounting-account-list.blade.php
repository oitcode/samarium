<div>
  <div class="table-responsive">
    <table class="table table-bordered" style="font-size: 1.3rem;">
      <thead>
        <tr class="bg-success text-white">
          <th>Acc ID</th>
          <th>Name</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($abAccounts as $abAccount)
          <tr role="button" wire:click="$emit('displayAbAccountLedger', {{ $abAccount->ab_account_id }})">
            <td>
              {{ $abAccount->ab_account_id }}
            </td>
            <td>
              {{ $abAccount->name }}
            </td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
      </tfoot>
    </table>
  </div>
</div>

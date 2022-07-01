<div>
  <div class="table-responsive bg-white border">
    <table class="table table-striped table-bordered mb-0" style="font-size: 1.1rem;">
      <thead>
        <tr class="bg-success text-white">
          <th></th>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($abAccountTypes as $abAccountType)
          <tr>
            <td style="width: 5vw;">
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="">
                    <i class="fas fa-folder text-primary mr-2"></i>
                    Todo
                  </button>
                </div>
              </div>
            </td>
            <td>
              {{ $abAccountType->ab_account_type_id }}
            </td>
            <td>
              {{ $abAccountType->name }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div>


  @if ($vendors != null && count($vendors) > 0)
    <div class="table-responsive bg-white border shadow-sm">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="bg-white text-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Pending</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vendors as $vendor)
            <tr style="" wire:click="$dispatch('displayVendor', { vendor: {{ $vendor }} })" role="button">
              <td>
                {{ $vendor->vendor_id }}
              </td>
              <td>
                {{ $vendor->name }}
              </td>
              <td>
                <span class="text-muted mr-1">
                  Rs
                </span>
                <span class="font-weight-bold">
                  @php echo number_format( $vendor->getBalance() ); @endphp
                </span>
              </td>
              <td>
                @if (true)
                  <button class="btn btn-primary px-2 py-1" wire:click="">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-danger px-2 py-1" wire:click="">
                    <i class="fas fa-trash"></i>
                  </button>
                  <button class="btn btn-success px-2 py-1" wire:click="">
                    <i class="fas fa-eye"></i>
                  </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No vendors.
    </div>
  @endif


</div>

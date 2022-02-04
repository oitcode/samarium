<x-box-list title="Vendor list">
  @if ($vendors != null && count($vendors) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>PAN Num</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vendors as $vendor)
            <tr>
              <td>
                {{ $vendor->vendor_id }}
              </td>
              <td>
                <a href="" wire:click.prevent="">
                {{ $vendor->name }}
                </a>
              </td>
              <td>
                {{ $vendor->phone }}
              </td>
              <td>
                {{ $vendor->email }}
              </td>
              <td>
                {{ $vendor->address }}
              </td>
              <td>
                {{ $vendor->pan_num }}
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No products.
    </div>
  @endif
</x-box-list>

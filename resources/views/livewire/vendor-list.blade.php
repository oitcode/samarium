<div>
  @if ($vendors != null && count($vendors) > 0)
    <div class="table-responsive bg-white border shadow">
      <table class="table table-hover">
        <thead>
          <tr class="text-secondary" style="font-size: 1.1rem;">
            <th>ID</th>
            <th>Name</th>
            <th>Pending</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vendors as $vendor)
            <tr style="font-size: 1.1rem;">
              <td>
                {{ $vendor->vendor_id }}
              </td>
              <td>
                <a href="" wire:click.prevent="$emit('displayVendor', {{ $vendor }})">
                {{ $vendor->name }}
                </a>
              </td>
              <td>
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
      No vendors.
    </div>
  @endif
</div>

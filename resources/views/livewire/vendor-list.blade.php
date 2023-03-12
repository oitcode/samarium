<div>
  @if ($vendors != null && count($vendors) > 0)
    <div class="table-responsive bg-white border shadow-sm">
      <table class="table table-hover">
        <thead>
          <tr class="
              {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              "
              style="font-size: 1rem;">
            <th>ID</th>
            <th>Name</th>
            <th>Pending</th>
            @if (false)
            <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($vendors as $vendor)
            <tr style="font-size: 0.8rem;" wire:click="$emit('displayVendor', {{ $vendor }})" role="button">
              <td>
                {{ $vendor->vendor_id }}
              </td>
              <td>
                {{ $vendor->name }}
              </td>
              <td>
                <span class="text-muted mr-1" style="font-size: 0.7rem;">
                  Rs
                </span>
                <span class="font-weight-bold">
                  @php echo number_format( $vendor->getBalance() ); @endphp
                </span>
              </td>
              @if (false)
              <td>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="$emit('displayVendor', {{ $vendor }})">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                  </div>
                </div>
              </td>
              @endif
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

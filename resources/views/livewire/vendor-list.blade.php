<div>


  @if ($vendors != null && count($vendors) > 0)
    <div class="table-responsive bg-white border shadow-sm">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="bg-white text-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Pending</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vendors as $vendor)
            <tr style="" wire:click="$emit('displayVendor', {{ $vendor }})" role="button">
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

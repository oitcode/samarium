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

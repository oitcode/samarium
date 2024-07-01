<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm h-100 d-none d-md-block">
    <div class="card-body p-0 bg-success text-white">
      <div class="p-3">
  
        <div class="">
          <div class="d-flex justify-content-between">

            <h2 class="h5 mb-4">
              Current bookings
            </h2>

            <i class="fas fa-bell fa-2x-rm"></i>
          </div>

          <h2 class="h2">
            {{ $currentBookingsCount }}
          </h2>
  
          <div class="h5 font-weight-bold mt-3">
            Rs
            @php echo number_format( $currentBookingsTotalAmount ); @endphp
          </div>
        </div>
  
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}

  <div class="d-md-none px-3 d-flex mb-3">
    <div class="border d-flex p-3 w-100 bg-success text-white rounded shadow">
      <i class="fas fa-coffee fa-2x mr-3"></i>
      <h2 class="h4 mr-4">
        Curent bookings
      </h2>
      <h2 class="h4 mr-4 badge badge-success-rm badge-pill" style="font-size: 1.1rem;">
        {{ $currentBookingsCount }}
      </h2>
  
      <div class="h3 font-weight-bold">
        Rs
        @php echo number_format( $currentBookingsTotalAmount ); @endphp
      </div>
    </div>
  </div>

</div>

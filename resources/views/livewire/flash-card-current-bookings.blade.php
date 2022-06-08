<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm h-100 d-none d-md-block">
    <div class="card-body p-0 bg-success text-white">
      <div class="d-flex p-3">
  
        <div class="">
          <h2 class="h3 mb-4">
            Curent bookings
          </h2>
          <h2 class="h1">
            {{ $currentBookingsCount }}
          </h2>
  
          <div class="h4 font-weight-bold mt-3">
            Rs
            @php echo number_format( $currentBookingsTotalAmount ); @endphp
          </div>
        </div>
  
        <div class="d-flex flex-column justify-content-center ml-5">
          <div class="d-flex justify-content-end">
            <i class="fas fa-coffee fa-2x"></i>
          </div>
        </div>
  
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}

  <div class="d-md-none p-3 bg-white border d-flex">
    <h2 class="h3 mr-4">
      Curent bookings
    </h2>
    <h2 class="h3 mr-4 badge badge-success badge-pill" style="font-size: 1.1rem;">
      {{ $currentBookingsCount }}
    </h2>
  
    <div class="h3 font-weight-bold">
      Rs
      @php echo number_format( $currentBookingsTotalAmount ); @endphp
    </div>
  </div>

</div>

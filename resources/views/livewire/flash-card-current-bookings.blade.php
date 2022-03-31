<div class="card shadow-sm">
  <div class="card-body p-0 bg-info text-white">
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

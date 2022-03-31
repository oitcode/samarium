<div class="card shadow-sm h-100">
  <div class="card-body p-0 bg-primary-rm text-white-rm">
    <div class="d-flex p-3">

      <div class="">
        <h2 class="h3 mb-4">
          Today takeaways
        </h2>
        <h2 class="h1">
          {{ $count }}
        </h2>

        <div class="h4 font-weight-bold mt-3">
          Rs
          @php echo number_format( $todayTakeawaysTotalAmount ); @endphp
        </div>
      </div>

      <div class="d-flex flex-column justify-content-center ml-5">
        <div class="d-flex justify-content-end">
          <i class="fas fa-skating fa-2x"></i>
        </div>
      </div>

    </div>
  </div>
</div>

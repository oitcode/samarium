<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm h-100 d-none d-md-block">
    <div class="card-body p-0 bg-primary-rm text-white-rm">
      <div class="p-3">

        <div class="">
          <div class="d-flex justify-content-between">

            <h2 class="h5 mb-4">
              Takeaways
            </h2>

            <i class="fas fa-skating fa-2x-rm text-muted"></i>
          </div>

          <h2 class="h2">
            {{ $count }}
          </h2>
  
          <div class="h5 font-weight-bold mt-3">
            Rs
            @php echo number_format( $todayTakeawaysTotalAmount ); @endphp
          </div>
        </div>
  
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}

  <div class="d-md-none px-3 d-flex mb-3">
    <div class="border d-flex p-3 w-100 bg-primary text-white rounded">
      <i class="fas fa-skating fa-2x mr-3"></i>
      <h2 class="h4 mr-4">
        Today takeaways
      </h2>
      <h2 class="h4 mr-4 badge badge-success-rm badge-pill" style="font-size: 1.1rem;">
        {{ $count }}
      </h2>
  
      <div class="h3 font-weight-bold">
        Rs
        @php echo number_format( $todayTakeawaysTotalAmount ); @endphp
      </div>
    </div>
  </div>

</div>

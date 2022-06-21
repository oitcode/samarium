<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm h-100 d-none d-md-block">
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

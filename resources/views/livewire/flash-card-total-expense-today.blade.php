<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm h-100 d-none d-md-block">
    <div class="card-body p-0 bg-danger text-white">
      <div class="p-3">
  
        <div class="">
          <div class="d-flex justify-content-between">

            <h2 class="h5 mb-4">
              Expense
            </h2>

            <i class="fas fa-tools"></i>
          </div>

          <h2 class="h3 font-weight-bold">
            Rs
            @php echo number_format( $todayExpenseTotalAmount ); @endphp
          </h2>
  
          <div class="mt-3">
            <span class="h5">
              {{ $count }}
            </span>
              bills
          </div>
        </div>
  
  
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}

  <div class="d-md-none px-3 d-flex mb-3">
    <div class="border d-flex p-3 w-100 bg-light text-primary rounded shadow">
      <i class="fas fa-check-circle fa-2x mr-3"></i>
      <h2 class="h4 mr-4">
        Expense
      </h2>
      <h2 class="h4 mr-4 badge badge-success-rm badge-pill" style="font-size: 1.1rem;">
        Rs
        @php echo number_format( $todayExpenseTotalAmount ); @endphp
      </h2>
  
      <div class="h3 font-weight-bold">
        {{ $count }}
      </div>
    </div>
  </div>

</div>

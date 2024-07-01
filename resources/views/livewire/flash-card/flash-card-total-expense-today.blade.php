<div>

  {{-- Show in bigger screens --}}
  <div class="card shadow-sm-rm h-100 d-none d-md-block border-0">
    <div class="card-body p-0 bg-danger-rm text-white-rm">
      <div class="p-0">
  
        <div class="">
          <div class="d-flex justify-content-between">

            <h2 class="h6 mb-3 text-secondary">
              Expense
            </h2>

            @if (false)
            <i class="fas fa-tools"></i>
            @endif
          </div>

          <h2 class="h5 font-weight-bold">
            Rs
            @php echo number_format( $todayExpenseTotalAmount ); @endphp
          </h2>
  
          <div class="mt-2 text-secondary">
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

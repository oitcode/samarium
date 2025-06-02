<div class="border bg-white p-3">

  {{-- Top info / Banner --}}
  <div class="border-bottom mb-4">
    <h1 class="h4 text-primary mb-3">
      Cash flow statement
    </h1>
    <p>
      For the Year Ending: 
      0000-00
    </p>
  </div>

  {{-- Accounting year info --}}
  <div class="mb-3">
    <div class="row border-bottom">
      <div class="col-md-6">
        <h2 class="h5 bg-primary-rm text-primary">
          Cash at the beginning of year
        </h2>
      </div>
      <div class="col-md-6">
        Rs
        000
      </div>
    </div>
  </div>

  {{-- Operations --}}
  <div class="mb-3 border-bottom">
    <div class="row">
      <div class="col-md-6">
        <h2 class="h5 p-2 bg-primary-rm text-primary">
          Cash flow from operations
        </h2>
      </div>
      <div class="col-md-6">
        Rs
        @php echo number_format( $netProfit ); @endphp
      </div>
    </div>

    <h3 class="h6 text-primary">
      Additions to cash
    </h3>

    <h3 class="h6 text-primary">
      Subtractions from cash
    </h3>
  </div>

  {{-- Investing --}}
  <div class="mb-3 border-bottom">
    <h2 class="h5 p-2 bg-primary-rm text-primary">
      Cash flow from investing
    </h2>
  </div>

  {{-- Financing --}}
  <div class="mb-3 border-bottom">
    <h2 class="h5 p-2 bg-primary-rm text-primary">
      Cash flow from financing
    </h2>
  </div>

  {{-- Net increase in cash --}}
  <div class="mb-3">
    <h2 class="h4 text-primary">
      Net increase in cash
    </h2>
  </div>

  {{-- Cash at End Of Year --}}
  <div class="mb-3">
    <h2 class="h5 text-muted">
      Cash at End Of Year
    </h2>
  </div>

</div>

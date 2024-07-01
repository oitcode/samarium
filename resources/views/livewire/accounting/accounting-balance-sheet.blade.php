<div class="border bg-white p-3">

  <h1 class="h4 text-primary mb-4">
    Balance sheet
  </h1>

  {{-- Toolbar --}}
  <div class="mb-4 d-flex justify-content-end">
    <button class="btn border mr-3 text-primary" style="font-size: 1rem;">
      <i class="fas fa-print mr-2"></i>
      <br />
      Print
    </button>

    <button class="btn border text-primary" style="font-size: 1rem;">
      <i class="fas fa-share mr-2"></i>
      <br />
      Share
    </button>
  </div>

  {{-- Assets --}}
  <div class="mb-3">
    <h2 class="text-primary h5 border-bottom">
      Assets
    </h2>

    <div class="row" style="font-size: 1rem;">
      <div class="col-6">
        Current assets
      </div>
      <div class="col-6">
        Rs
        @php echo number_format( $assetTotal ); @endphp
      </div>
    </div>

    <div class="row" style="font-size: 1rem;">
      <div class="col-6">
        Non-current assets
      </div>
      <div class="col-6">
        Rs 0
      </div>
    </div>

  </div>

  {{-- Liabilities --}}
  <div class="mb-3">
    <h2 class="text-primary h5 border-bottom">
      Liabilities
    </h2>

    <div class="row" style="font-size: 1rem;">
      <div class="col-6">
        Current liabilities
      </div>
      <div class="col-6">
        Rs
        @php echo number_format( $liabilityTotal ); @endphp
      </div>
    </div>

    <div class="row" style="font-size: 1rem;">
      <div class="col-6">
        Non-current liabilities
      </div>
      <div class="col-6">
        Rs 0
      </div>
    </div>
  </div>

  {{-- Equity --}}
  <div class="mb-3">
    <h2 class="text-primary h5 border-bottom">
      Equity
    </h2>

    <div class="row" style="font-size: 1rem;">
      <div class="col-6">
        Equity
      </div>
      <div class="col-6" style="font-size: 1rem;">
        Rs
        @php echo number_format( $equityTotal ); @endphp
      </div>
    </div>
  </div>

</div>

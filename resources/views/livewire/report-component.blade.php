<div>

  <div class="row mb-4">
    <div class="col-md-3">
      @livewire ('report-transaction-component')
    </div>
    <div class="col-md-3">
      @livewire ('chart-week-sales', key(rand()))
    </div>
    <div class="col-md-6">
      @livewire ('chart-sale-by-category', key(rand()))
    </div>
  </div>

  <div class="row mb-4">
    @if (false)
    <div class="col-md-6">
      @livewire ('table-top-selling-products-day')
    </div>
    @endif
  </div>

  <div class="row p-2">
    <div class="col-md-5 bg-white border mr-3">
      @livewire ('report-product-sales-count')
    </div>
    <div class="col-md-5 bg-white border">
      @livewire ('report-product-purchase-count')
    </div>
  </div>


</div>

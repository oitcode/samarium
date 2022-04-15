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

</div>

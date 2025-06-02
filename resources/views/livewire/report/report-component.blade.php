<div class="p-md-none">

  {{-- Top toolbar --}}
  <x-toolbar-classic toolbarTitle="Reports">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  <div class="row mb-4">
    <div class="col-md-3 mb-3">
      @livewire ('report.report-transaction-component')
    </div>
    <div class="col-md-3 mb-3">
      @livewire ('chart.dashboard.chart-week-sales', key(rand()))
    </div>
    <div class="col-md-6 mb-3">
      @livewire ('chart.dashboard.chart-sale-by-category', key(rand()))
    </div>
  </div>

  <div class="row p-2">
    <div class="col-md-5 bg-white border mr-3 mb-3">
      @livewire ('report.report-product-sales-count')
    </div>
    <div class="col-md-5 bg-white border mb-3">
      @livewire ('report.report-product-purchase-count')
    </div>
  </div>

</div>

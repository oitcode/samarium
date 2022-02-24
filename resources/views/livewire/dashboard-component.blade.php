<div class="">

  @if (false)
  <div class="row">
    <div class="col-md-6">
      <x-card-box card-bg="bg-primary" title="Foo" number="55" fa-class="fas fa-plus"/>
    </div>

    <div class="col-md-6">
      <x-card-box card-bg="bg-primary" title="Total sale invoices" number="55" fa-class="fas fa-plus"/>
      <x-card-box card-bg="bg-success" title="Total customers" number="55" fa-class="fas fa-plus"/>
      <x-card-box card-bg="bg-warning" title="Foo" number="55" fa-class="fas fa-plus"/>
      <x-card-box card-bg="bg-danger" title="Foo" number="55" fa-class="fas fa-plus"/>
    </div>

  </div>
  @endif

  @if (false)
  <div class="">
    @livewire ('sale-component')
  </div>
  <div class="row">
    <div class="col-md-6">
      @livewire ('product-category-component')
      @livewire ('vendor-component')
      @livewire ('customer-component')
    </div>
    <div class="col-md-6">
      @livewire ('product-component')
      @livewire ('purchase-component')
      @livewire ('daybook-component')
    </div>
  </div>
  @endif

  @if (true)
  <div>
    @livewire ('cafe-sale-component')
    @if (false)
    <div class="row">
      <div class="col-md-8">
        @livewire ('counter-dash-component')
      </div>
      <div class="col-md-4">
        @livewire ('company-info-component')
      </div>
    </div>
    @endif
  </div>
  @endif

  @if (false)
  <div>
    @livewire ('seat-table-work-display')
  </div>
  @endif
</div>

<div>


  {{-- Top tool bar --}}
  <x-toolbar-classic toolbarTitle="Sale quotation">

    @include ('partials.dashboard.spinner-button')

    @if ($modes['listSaleQuotationMode'] || !array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createSaleQuotationMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createSaleQuotationMode',
      ])
    @endif

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['createSaleQuotationMode'])
    @livewire ('sale-quotation.dashboard.sale-quotation-create')
  @elseif ($modes['listSaleQuotationMode'])
    @livewire ('sale-quotation.dashboard.sale-quotation-list')
  @elseif ($modes['searchSaleQuotationMode'])
    @livewire ('sale-quotation.dashboard.sale-quotation-search')
  @elseif ($modes['displaySaleQuotationMode'])
    @livewire ('sale-quotation.dashboard.sale-quotation-work', ['saleQuotation' => $displayingSaleQuotation,])
  @else
    @livewire ('sale-quotation.dashboard.sale-quotation-list')
  @endif


</div>

<div class="row-rm p-3-rm justify-content-between-rm bg-light-rm mb-4" style="margin: auto;">

  <div class="col-6-rm col-md-3-rm mr-3-rm mb-3 p-0 pr-3">
    <button class="btn btn-primary p-3 w-100" wire:click="enterModeSilent('addItem')">
      <i class="fas fa-plus-circle mr-3"></i>
      <br/>
      Add item
    </button>
  </div>

  <div class="col-6-rm col-md-3-rm mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('dashboard-print-sale-invoice', $saleInvoice->sale_invoice_id) }}" class="btn btn-success p-3 w-100" target="_blank">
      <i class="fas fa-print mr-3"></i>
      <br/>
      Print
    </a>
  </div>

</div>

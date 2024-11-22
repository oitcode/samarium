
  <button class="btn btn-success p-3" wire:click="enterModeSilent('addItem')">
    <i class="fas fa-plus-circle mr-1"></i>
    Add item
  </button>

  <a href="{{ route('dashboard-print-sale-quotation', $saleQuotation->sale_quotation_id) }}" class="btn btn-primary p-3" target="_blank">
    <i class="fas fa-print mr-1"></i>
    Print
  </a>


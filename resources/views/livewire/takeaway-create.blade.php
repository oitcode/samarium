<div>
  @if (false)
  @livewire ('takeaway-work', ['takeaway' => $takeaway,])
  @endif

  @livewire ('sale-invoice-work', ['saleInvoice' => $takeaway->saleInvoice,])
</div>

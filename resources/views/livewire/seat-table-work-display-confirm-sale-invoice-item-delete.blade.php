<div>
      <div class="modal enter" tabindex="-1" role="dialog" data-backdrop="static" id="saleInvoiceItemDeleteConfirmModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                <i class="fas fa-exclamation-triangle text-danger mr-2"></i>
                Confirm Delete
              </h5>
            </div>
      
            <div class="modal-body p-0">
              <div class="p-3">
                <p>
                  Do you really want to delete ?
                </p>
                <div class="row text-muted">
                  <div class="col">
                    <strong>
                      &nbsp;
                    </strong>
                    <br />
                    {{ $deletingSaleInvoiceItem->sale_invoice_item_id }}
                  </div>
                  <div class="col">
                    <strong>
                      Name
                    </strong>
                    <br />
                    {{ $deletingSaleInvoiceItem->product->name }}
                  </div>
                </div>
              </div>

              <div class="mx-2 mb-3">
                <button wire:click="$emit('removeItemFromCurrentBooking', {{ $deletingSaleInvoiceItem->sale_invoice_item_id }})" class="btn btn-sm btn-danger mr-3" data-dismiss="modal">Delete</button>
                <button wire:click="$emit('exitDeleteSaleInvoiceItem')" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
      
            </div>
          </div>
        </div>
      </div>
      
      <script>
          /* Show the modal on load */
          $(document).ready(function () {
             $('#saleInvoiceItemDeleteConfirmModal').modal('show');
          });
      </script>
</div>

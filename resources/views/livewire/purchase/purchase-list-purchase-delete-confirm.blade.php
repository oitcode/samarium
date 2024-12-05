<div style="width: 1000px !important;">
      <div class="modal enter" tabindex="-1" role="dialog" data-backdrop="static" id="purchaseDeleteConfirmModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                <i class="fas fa-exclamation-circle text-danger mr-2"></i>
                  Delete purchase?
              </h5>
            </div>
      
            <div class="modal-body p-0">
              <div class="p-3">
                <div class="row text-muted">
                  <div class="col">
                    <div class="d-flex justify-content-center h-100 text-secondary">
                      <div class="d-flex justify-content-center align-self-center">
                        <h3 class="h5 font-weight-bold p-3">
                          Purchase ID: {{ $purchase->purchase_id }}
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h3 class="h5 font-weight-bold p-3">
                      Rs
                      @php echo number_format( $purchase->getTotalAmount() ); @endphp
                    </h3>
                  </div>
                </div>
              </div>

              <div class="mx-2 ml-3 mt-3 mb-3">
                <button wire:click="deletePurchase({{ $purchase }})"
                    class="btn btn-sm btn-danger mr-3 p-2"
                    data-dismiss="modal">
                  Remove
                </button>
                <button wire:click="$dispatch('exitConfirmPurchaseDelete')"
                    class="btn btn-sm btn-secondary mr-3 p-2"
                    data-dismiss="modal">
                  Cancel
                </button>
              </div>
      
            </div>
          </div>
        </div>
      </div>
      
      <script>
          /* Show the modal on load */
          $(document).ready(function () {
             $('#purchaseDeleteConfirmModal').modal('show');
          });
      </script>
</div>

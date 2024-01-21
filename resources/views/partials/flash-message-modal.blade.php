<div>
      <div class="modal enter" tabindex="-1" role="dialog" data-backdrop="static" id="flashMessageModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">
                <i class="fas fa-exclamation-triangle text-danger mr-2"></i>
                Message
              </h5>
            </div>
      
            <div class="modal-body p-0">
              <div class="p-3">
                {{ $message }}
              </div>
            </div>

          </div>

          <div class="mx-2 mb-3">
            <button wire:click="$emit('exitFlashMessageModal')" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
          </div>

        </div>

      </div>
      
      <script>
          /* Show the modal on load */
          $(document).ready(function () {
             $('#flashMessageModal').modal('show');
          });
      </script>
</div>

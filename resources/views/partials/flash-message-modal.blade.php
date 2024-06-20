<div>
      <div class="modal enter" tabindex="-1" role="dialog" data-backdrop="static" id="flashMessageModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
      
            @if (true)
            <div class="modal-body p-3 border-0 text-center">
              <h5 class="modal-title text-center mb-4">
                <i class="fas fa-check-circle text-success mr-2"></i>
                {{ $message }}
              </h5>
              <div class="border-0 text-center">
                <button type="button" class="btn btn-light border p-3" data-dismiss="modal">OK</button>
              </div>
            </div>
            @endif


          </div>

        </div>

      </div>
      
      <script>
           $('#flashMessageModal').modal();
      </script>
</div>

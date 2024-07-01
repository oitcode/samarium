<div style="width: 1000px !important; font-size: 1.3rem;">
      <div class="modal enter" tabindex="-1" role="dialog" data-backdrop="static" id="expenseDeleteConfirmModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                <i class="fas fa-exclamation-circle text-danger mr-2"></i>
                  Delete expense?
              </h5>
            </div>
      
            <div class="modal-body p-0">
              <div class="p-3">
                <div class="row text-muted">
                  <div class="col">
                    <div class="d-flex justify-content-center h-100 text-secondary">
                      <div class="d-flex justify-content-center align-self-center">
                        <h3 class="h5 font-weight-bold p-3">
                          Expense ID: {{ $expense->expense_id }}
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h3 class="h5 font-weight-bold p-3">
                      Rs
                      @php echo number_format( $expense->getTotalAmount() ); @endphp
                    </h3>
                  </div>
                </div>
              </div>

              <div class="mx-2 ml-3 mt-3 mb-3">
                <button wire:click="deleteExpense({{ $expense }})"
                    class="btn btn-sm btn-danger mr-3 p-2"
                    data-dismiss="modal"
                    style="font-size: 1.2rem;">
                  Remove
                </button>
                <button wire:click="$emit('exitConfirmExpenseDelete')"
                    class="btn btn-sm btn-secondary mr-3 p-2"
                    data-dismiss="modal"
                    style="font-size: 1.2rem;">
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
             $('#expenseDeleteConfirmModal').modal('show');
          });
      </script>
</div>

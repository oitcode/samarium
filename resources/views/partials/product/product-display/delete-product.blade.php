<div class="mb-4 bg-white">
  <div class="d-flex justify-content-between p-3">
    <div>
      <div class="">
        <strong>
          Delete this product
        </strong>
      </div>
    </div>

    <div>
      @if ($modes['delete'])
        @if ($modes['cannotDelete'])
          <span class="text-danger mr-3">
            <i class="fas fa-exclamation-circle"></i>
            This product cannot be deleted
          </span>
        @else
          <button class="btn btn-danger" wire:click="deleteProductConfirm">
            Confirm delete
          </button>
        @endif
        <button class="btn btn-light" wire:click="exitMode('delete')">
          Cancel
        </button>
      @else
        <button class="btn btn-outline-danger" wire:click="deleteProduct">
          Delete
        </button>
      @endif
    </div>
  </div>
</div>

<div>


  <select class="custom-control w-75" wire:model="status">
    <option value="pending">Pending</option>
    <option value="progress">Progress</option>
    <option value="deferred">Deferred</option>
    <option value="cancelled">Cancelled</option>
    <option value="done">Done</option>
  </select>
  <div class="my-3">
    <button class="btn btn-sm btn-success ml-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-sm btn-danger ml-2" wire:click="$dispatch('todoUpdateStatusCancelled')">
      Cancel
    </button>
  </div>


</div>

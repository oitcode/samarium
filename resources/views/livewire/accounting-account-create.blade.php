<div class="p-2 border bg-white">

  <h1 class="h5 py-3">
    Create new account
  </h1>

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Parent account</label>
    <select class="custom-select" wire:model.defer="parent_account_id">
      <option>---</option>
      @foreach ($abAccounts as $abAccount)
        <option value="{{ $abAccount->ab_account_id }}">
          {{ $abAccount->name }}
        </option>
      @endforeach
    </select>
    @error('parent_account_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="py-3">
    <button type="submit" class="btn btn-success" style="font-size: 1rem;" wire:click="store">
      Submit
    </button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')" style="font-size: 1rem;">
      Cancel
    </button>
  </div>

</div>

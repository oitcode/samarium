<div class="p-2 border bg-white">

  <h1 class="h5 py-3">
    Create new account type
  </h1>

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Parent account type</label>
    <select class="custom-select" wire:model="parent_ab_account_type_id">
      <option>---</option>
      @foreach ($abAccountTypes as $abAccountType)
        <option value="{{ $abAccountType->ab_account_type_id }}">
          {{ $abAccountType->name }}
        </option>
      @endforeach
    </select>
    @error('parent_ab_account_type_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="py-3">
    <button type="submit" class="btn btn-success" wire:click="store">
      Submit
    </button>
    <button type="submit" class="btn btn-danger" wire:click="$dispatch('exitAccountTypeCreateMode')">
      Cancel
    </button>
  </div>

</div>

<div class="p-2 border bg-white">

  <h1 class="h5 py-3">
    Create new account
  </h1>

  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Account type</label>
    <select class="custom-select" wire:model="ab_account_type_id">
      <option>---</option>
      @foreach ($abAccountTypes as $abAccountType)
        <option value="{{ $abAccountType->ab_account_type_id }}">
          {{ $abAccountType->name }}
        </option>
      @endforeach
    </select>
    @error('ab_account_type_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Increase type</label>
    <select class="custom-select" wire:model="increase_type">
      <option>---</option>
        <option value="debit">Debit</option>
        <option value="credit">Credit</option>
    </select>
    @error('increase_type') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="py-3">
    <button type="submit" class="btn btn-success" wire:click="store">
      Submit
    </button>
    <button type="submit" class="btn btn-danger" wire:click="$dispatch('exitCreateMode')">
      Cancel
    </button>
  </div>

</div>

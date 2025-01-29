<div class="card">

  <div class="card-body">
    <h3 class="h5 text-secondary">Add item to menu dropdown</h3>
  
    <div class="form-group">
      <label>Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Webpage</label>
      <select class="custom-select" wire:model="webpage_id">
        <option>---</option>
        @foreach($webpages as $webpage)
          <option value="{{ $webpage->webpage_id }}">{{ $webpage->name }}</option>
        @endforeach
      </select>
      @error('webpage_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="mt-4">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateCmsNavMenuDropdownItemMode',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>

<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">Add item to menu</h3>
  
    @if (false)
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Type</label>
      <select class="custom-select" wire:model.defer="o_type" style="font-size: 1.3rem;">
        <option>---</option>
          <option value="item">Link</option>
          <option value="dropdown">Dropdown</option>
      </select>
      @error('o_type') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    @endif

    <div class="form-group">
      <label>Webpage</label>
      <select class="custom-select" wire:model.defer="webpage_id" style="font-size: 1.3rem;">
        <option>---</option>
        @foreach($webpages as $webpage)
          <option value="{{ $webpage->webpage_id }}">{{ $webpage->name }}</option>
        @endforeach
      </select>
      @error('webpage_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="mt-4" style="font-size: 1.3rem;">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateCmsNavMenuItemMode',])
    </div>
  
  </div>
</div>

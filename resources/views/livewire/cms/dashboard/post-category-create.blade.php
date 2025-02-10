<div>

  <x-create-box-component title="Create post category">
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'createPostCategoryCanceled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>

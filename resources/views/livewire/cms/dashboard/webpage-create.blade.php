<div class="card">
  <div class="card-body">
  
    <h1 class="h5 font-weight-bold mb-4">
      @if ($is_post == 'yes')
        Create new post
      @else
        Create new page
      @endif
    </h1>
  
    <div class="form-group">
      <label for="">Name *</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($is_post == 'no')
    <div class="form-group">
      <label for="">Permalink *</label>
      <input type="text"
          class="form-control"
          wire:model="permalink">
      @error('permalink') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="mt-4">
      @include ('partials.button-store')
      @if ($is_post == 'yes')
        @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreatePostMode',])
      @else
        @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
      @endif
    </div>
  
  </div>
</div>

<div class="card">

  @php
    if ($is_post == 'yes') {
      $headingTitle = 'Create new post';
    } else {
      $headingTitle = 'Create new page';
    }
  @endphp
    
  <x-create-box-component :title="$headingTitle">
    <div class="form-group">
      <label>Name *</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($is_post == 'no')
    <div class="form-group">
      <label>Permalink *</label>
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
  </x-create-box-component>

</div>

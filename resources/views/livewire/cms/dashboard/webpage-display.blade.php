<div class="p-3 bg-white border shadow-sm">

  <div class="mb-3">
    <h2>
      {{ $webpage->name }}
    </h2>
  </div>

  <div class="my-3">
    <div>
      Permalink: {{ $webpage->permalink }}
      <button class="btn btn-light" wire:click="">
        Edit
      </button>
    </div>
  </div>

  {{-- Toolbar --}}
  <div class="mb-3 p-2 d-none d-md-block bg-dark">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createWebpageContent')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Add content',
        'btnCheckMode' => 'createWebpageContent',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="">
        @if ($modes['createWebpageContent'])
          @livewire ('cms.dashboard.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
        @else
          <div class="" style="">
            @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
              @livewire ('cms.dashboard.webpage-content-display', ['webpageContent' => $webpageContent,], key(rand()))
            @endforeach
          </div>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <h2 class="p-3">
        Featured image
        @if ($webpage->featured_image_path)
          <button class="btn btn-light" wire:click="">
            Edit
          </button>
        @endif
      </h2>

      @if ($webpage->featured_image_path)
        <div>
          <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
              class="img-fluid rounded-circle-rm"
              style=""
          >
        </div>
      @else
        <div class="form-group">
            <label for="">Featured Image</label>
            <input type="file" class="form-control" wire:model="featured_image">
            @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="my-2">
          <button class="btn btn-success" wire:click="addFeaturedImage">
            Save
          </button>
        </div>
      @endif
    </div>
  </div>

</div>

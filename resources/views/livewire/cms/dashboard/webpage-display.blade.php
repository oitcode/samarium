<div class="p-3 bg-white border shadow-sm">

  <div class="my-3">
    <h2>
      {{ $webpage->name }}
    </h2>
  </div>

  <div class="my-3">
    <div>
      Permalink: {{ $webpage->permalink }}
    </div>
  </div>

  <div class="my-3">
    <button class="btn border mr-3" wire:click="enterMode('createWebpageContent')">
      <i class="fas fa-plus-circle mr-2"></i>
    </button>
  </div>

  <div class="row">
    <div class="col-md-8">
      @if ($modes['createWebpageContent'])
        @livewire ('cms.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
      @else
        <div class="" style="">
          @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
            @livewire ('cms.webpage-content-display', ['webpageContent' => $webpageContent,], key(rand()))
          @endforeach
        </div>
      @endif
    </div>
    <div class="col-md-4 border">
      <h2 class="p-3">
        Featured image
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

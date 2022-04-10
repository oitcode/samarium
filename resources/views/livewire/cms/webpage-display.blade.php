<div class="p-3 bg-white border shadow-sm">

  <div class="my-3">
    <h2>
      {{ $webpage->name }}
    </h2>
  </div>

  <div class="my-3">
    <button class="btn border" wire:click="enterMode('createWebpageContent')">
      <i class="fas fa-plus-circle mr-2"></i>
    </button>
  </div>

  @if ($modes['createWebpageContent'])
    @livewire ('cms.webpage-display-webpage-content-create', ['webpage' => $webpage,])
  @endif

  <div class="container" style="font-size: 1.3rem;">
    @php
      $i = 0;
    @endphp
    @foreach ($webpage->webpageContents as $webpageContent)
      <div class="row my-4">
        @if ($i % 2 == 0)
          <div class="col-md-6">
            {{ $webpageContent->body }}
          </div>
          <div class="col-md-6">
            <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid">
          </div>
        @else
          <div class="col-md-6">
            <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid">
          </div>
          <div class="col-md-6">
            {{ $webpageContent->body }}
          </div>
        @endif
      </div>
      @php
        $i++;
      @endphp
    @endforeach
  </div>

</div>

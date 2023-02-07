<div>

  {{-- Display controls --}}
  <div class="text-muted mb-3" style="font-size: 0.7rem;">
    <i class="fas fa-arrow-down mr-2" wire:click="moveDown"></i>
    <i class="fas fa-arrow-up mr-2" wire:click="moveUp"></i>
    <i class="fas fa-pencil-alt mr-2"></i>
    <i class="fas fa-trash mr-2" wire:click="deleteContent"></i>
  </div>

  {{-- Display the content --}}

  <div class="container-fluid bg-white p-0 border-rm" 
      style="font-size: 1.2em;">
  
  
      <div class="container py-5">
        <div class="row d-flex">
          {{--
          @if ($i % 2 == 0)
          --}}
            <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
              <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $webpageContent->title}}
              </h2>
              <p class="text-secondary">
                {{ $webpageContent->body}}
              </p>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('storage/' . $webpageContent->image_path) }}"
                  class="img-fluid rounded-circle-rm"
                  style=""
              >
            </div>
          {{--
          @else
          --}}
            @if (false)
            <div class="col-md-6">
              <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
            </div>
            <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
              <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $webpageContent->title}}
              </h2>
              <p class="text-secondary">
                {{ $webpageContent->body}}
              </p>
            </div>
            @endif
          {{--
          @endif
          --}}
        </div>
      </div>
  
  </div>
</div>

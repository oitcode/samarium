<div>

  {{-- Display controls --}}
  <div class="text-dark mb-0 bg-light p-3 border" style="font-size: 0.7rem;">
    <i class="fas fa-arrow-down mr-4 fa-2x" wire:click="moveDown" role="button"></i>
    <i class="fas fa-arrow-up mr-4 fa-2x" wire:click="moveUp" role="button"></i>
    <i class="fas fa-pencil-alt mr-4 fa-2x" wire:click="enterMode('edit')" role="button"></i>
    <i class="fas fa-trash mr-4 fa-2x" wire:click="deleteContent" role="button"></i>
  </div>

  {{-- Display the content --}}

  @if ($modes['edit'])
    @livewire ('cms.dashboard.webpage-content-edit', ['webpageContent' => $webpageContent,])
  @else
  <div class="container-fluid bg-white p-0 border-rm bg-warning mb-4" 
      style="font-size: 1.2em;">
  
  
      <div class="container py-5 border">
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
              @if ($webpageContent->image_path)
                <img src="{{ asset('storage/' . $webpageContent->image_path) }}"
                    class="img-fluid rounded-circle-rm"
                    style=""
                >
              @endif
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
  @endif
</div>

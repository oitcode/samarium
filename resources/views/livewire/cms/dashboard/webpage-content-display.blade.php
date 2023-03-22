<div>

  {{-- Display controls --}}
  <div class="text-dark mb-0 bg-light p-3 border p-3" style="font-size: 0.7rem;">
    <i class="fas fa-arrow-down mr-2 fa-2x-rm border p-3" wire:click="moveDown" role="button"></i>
    <i class="fas fa-arrow-up mr-2 fa-2x-rm border p-3" wire:click="moveUp" role="button"></i>
    <i class="fas fa-pencil-alt mr-2 fa-2x-rm border p-3" wire:click="enterMode('edit')" role="button"></i>
    <i class="fas fa-star mr-2 fa-2x-rm border p-3" wire:click="enterMode('css')" role="button"></i>
    <i class="fas fa-trash mr-2 fa-2x-rm border p-3" wire:click="enterMode('delete')" role="button"></i>
    @if ($modes['delete'])
      <button class="btn btn-danger" wire:click="deleteContent">
        Confirm delete
      </button>
      <button class="btn btn-dark" wire:click="exitMode('delete')">
        Cancel
      </button>
    @endif
  </div>

  {{-- Display the content --}}

  @if ($modes['edit'])
    @livewire ('cms.dashboard.webpage-content-edit', ['webpageContent' => $webpageContent,])
  @elseif ($modes['css'])
    @livewire ('cms.dashboard.webpage-content-edit-css', ['webpageContent' => $webpageContent,])
  @else
  <div class="container-fluid bg-white p-0 border-rm bg-warning mb-4" 
      style="font-size: 1.2em;">
  
  
      <div class="container py-3 border">
        <div class="row d-flex">
          {{--
          @if ($i % 2 == 0)
          --}}
            <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
              <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $webpageContent->title}}
              </h2>
              <p class="text-secondary">
                {!! $webpageContent->body !!}
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

<div>

  {{-- Display controls --}}
  @if (false)
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
  @endif

{{-- Toolbar --}}
<div class="d-flex justify-content-between">

  {{-- Toolbar body --}}
  <div>
    @if ($modes['delete'])
      <button class="btn btn-danger" wire:click="deleteContent">
        Confirm delete
      </button>
      <button class="btn btn-dark" wire:click="exitMode('delete')">
        Cancel
      </button>
    @endif
  </div>
  
  {{-- Options dropdown --}}
  <div class="dropdown">
    <button class="btn btn-light dropdown-toggle"
        type="button" id="dropdownMenuButton-{{ $webpageContent->webpage_content_id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-angle-down"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <button class="dropdown-item" wire:click="moveDown"><i class="fas fa-arrow-down"></i></btn>
      <button class="dropdown-item" wire:click="moveUp"><i class="fas fa-arrow-up"></i></btn>
      <button class="dropdown-item" wire:click="enterMode('edit')"><i class="fas fa-pencil-alt"></i></btn>
      <button class="dropdown-item" wire:click="enterMode('css')"><i class="fas fa-star"></i></btn>
      <button class="dropdown-item" wire:click="enterMode('delete')"><i class="fas fa-trash"></i></btn>
    </div>
  </div>
</div>

  {{-- Display the content --}}

  @if ($modes['edit'])
    @livewire ('cms.dashboard.webpage-content-edit', ['webpageContent' => $webpageContent,])
  @elseif ($modes['css'])
    @livewire ('cms.dashboard.webpage-content-edit-css', ['webpageContent' => $webpageContent,])
  @else

  <div class="container-fluid bg-white p-0 border-rm bg-warning mb-4" 
      style="{{--font-size: 1.2em;--}}">
  
      <div class="container py-1 border-top bg-danger-rm">
        <div class="row" style="margin: auto;">
            <div class="col-md-12 justify-content-center align-self-center" style="{{--font-size: 1.1em !important;--}}">
              @if (false)
              <h2 class="h1 mt-1 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $webpageContent->title}}
              </h2>
              @endif
              <div class="bg-success-rm">
                {!! $webpageContent->body !!}
              </div>
            </div>
            @if (false)
            <div class="col-md-6">
              @if ($webpageContent->image_path)
                <img src="{{ asset('storage/' . $webpageContent->image_path) }}"
                    class="img-fluid rounded-circle-rm"
                    style=""
                >
              @endif
            </div>
            @endif
        </div>
      </div>
  
  </div>

  @endif
</div>

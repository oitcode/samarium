<div>


  {{-- Display controls --}}
  @if (false)
  <div class="text-dark mb-0 bg-light p-3 border p-3">
    <i class="fas fa-arrow-down mr-2 border p-3" wire:click="moveDown" role="button"></i>
    <i class="fas fa-arrow-up mr-2 border p-3" wire:click="moveUp" role="button"></i>
    <i class="fas fa-pencil-alt mr-2 border p-3" wire:click="enterMode('edit')" role="button"></i>
    <i class="fas fa-star mr-2 border p-3" wire:click="enterMode('css')" role="button"></i>
    <i class="fas fa-trash mr-2 border p-3" wire:click="enterMode('delete')" role="button"></i>
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

  @if ($modes['edit'])
    {{--
    | Edit the content if in edit mode.
    --}}
    @livewire ('cms.dashboard.webpage-content-edit', ['webpageContent' => $webpageContent,])
  @elseif ($modes['css'])
    {{--
    | Edit the css if in css mode.
    --}}
    @livewire ('cms.dashboard.webpage-content-edit-css', ['webpageContent' => $webpageContent,])
  @else
    {{--
    | Display the content
    --}}
    <div class="container-fluid bg-white p-0 bg-warning mb-4">
      <div class="container-rm py-1 border-top">
        <div class="">
          <div>
            {!! $webpageContent->body !!}
          </div>
        </div>

        @if (false)
        {{--
        | This is from old design. Not sure if this will
        | be needed in future.
        --}}
        <div>
          @if ($webpageContent->image_path)
            <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid">
          @endif
        </div>
        @endif
      </div>
    </div>
  @endif


</div>

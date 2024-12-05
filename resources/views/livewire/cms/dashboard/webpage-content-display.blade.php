<div>


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
      <div class="py-1 border-top">
        <div class="">
          <div>
            {!! $webpageContent->body !!}
          </div>
        </div>
      </div>
    </div>
  @endif


</div>

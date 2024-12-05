<div class="m-3">


  {{-- Show appropriate content adding component --}}
  @if ($modes['headingMode'])
    @livewire ('cms.dashboard.webpage-content-create-heading', ['webpage' => $webpage,])
  @elseif ($modes['imageMode'])
    @livewire ('cms.dashboard.webpage-content-create-image', ['webpage' => $webpage,])
  @elseif ($modes['paragraphMode'])
    @livewire ('cms.dashboard.webpage-content-create-paragraph', ['webpage' => $webpage,])
  @elseif ($modes['mediaAndTextMode'])
    @livewire ('cms.dashboard.webpage-content-create-media-and-text', ['webpage' => $webpage,])
  @elseif ($modes['galleryMode'])
    @livewire ('cms.dashboard.webpage-content-create.gallery', ['webpage' => $webpage,])
  @elseif ($modes['rowMode'])
    @livewire ('cms.dashboard.webpage-content-create.row', ['webpage' => $webpage,])
  @elseif ($modes['youtubeVideoMode'])
    @livewire ('cms.dashboard.webpage-content-create.youtube-video', ['webpage' => $webpage,])
  @else
    <div class="row">

      <div class="col-md-2 border p-3" wire:click="enterMode('headingMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fas fa-heading"></i>
        </div>
        <div class="d-flex justify-content-center">
          Heading
        </div>
      </div>

      <div class="col-md-2 border p-3" wire:click="enterMode('paragraphMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fas fa-paragraph"></i>
        </div>
        <div class="d-flex justify-content-center">
          Paragraph
        </div>
      </div>

      <div class="col-md-2 border p-3" wire:click="enterMode('imageMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fas fa-image"></i>
        </div>
        <div class="d-flex justify-content-center">
          Image
        </div>
      </div>

      <div class="col-md-2 border p-3" wire:click="enterMode('mediaAndTextMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fas fa-object-group"></i>
        </div>
        <div class="d-flex justify-content-center">
          Media & Text 
        </div>
      </div>

      <div class="col-md-2 border p-3" wire:click="enterMode('galleryMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fas fa-images"></i>
        </div>
        <div class="d-flex justify-content-center">
          Gallery
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-2 border p-3" wire:click="enterMode('youtubeVideoMode')" role="button">
        <div class="d-flex justify-content-center mb-3">
          <i class="fab fa-youtube"></i>
        </div>
        <div class="d-flex justify-content-center">
          Youtube video
        </div>
      </div>

      <div class="col-md-2 border p-0" wire:click="$dispatch('exitCreateWebpageContent')" role="button">
        <div class="d-flex justify-content-center h-100">
          <button class="btn btn-danger h-100 w-100">
            Cancel
          </button>
        </div>
      </div>
    </div>
  @endif


</div>

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

  @if ($modes['createWebpageContent'])
    @livewire ('cms.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
  @else
    <div class="" style="">
      @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
        @livewire ('cms.webpage-content-display', ['webpageContent' => $webpageContent,])
      @endforeach
    </div>
  @endif


</div>

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
  @endif

  <div class="" style="font-size: 1.3rem;">
    @foreach ($webpage->webpageContents as $webpageContent)
      @if ($webpageContent->webpage_content_type == 'heading')
        {{ $webpageContent->content }}
      @endif
    @endforeach
  </div>

</div>

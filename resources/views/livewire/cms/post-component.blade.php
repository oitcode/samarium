<div>
  @if (true)


  <div class="mb-3">
    <button class="btn btn-success badge-pill btn-success-rm m-0 border shadow-sm" style="" wire:click="enterMode('createPostMode')">
      <i class="fas fa-plus-circle mr-1"></i>
      New
    </button>

    <button class="btn bg-white badge-pill btn-success-rm m-0 border shadow-sm" style="" wire:click="enterMode('listPostMode')">
      <i class="fas fa-list mr-1"></i>
      List
    </button>

    <button class="btn btn-warning m-0 float-right"
        style="">
      Posts
    </button>

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


    <div class="clearfix">
    </div>
  </div>
  @endif

  @if ($modes['createPostMode'])
    @livewire ('ecs.webpage-create', ['is_post' => 'yes',])
  @elseif ($modes['listPostMode'])
    @livewire ('cms.post-list')
  @elseif ($modes['displayPostMode'])
    @livewire ('cms.webpage-display', ['webpage' => $displayingPost,])
  @endif
</div>

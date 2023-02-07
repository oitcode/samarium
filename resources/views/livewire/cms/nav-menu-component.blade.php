<div>
  @if (true)


  <div class="mb-3">
    @if (\App\CmsNavMenu::first())
    @else
      <button class="btn btn-success badge-pill btn-success-rm m-0 border shadow-sm" style="" wire:click="enterMode('create')">
        <i class="fas fa-plus-circle mr-1"></i>
        New
      </button>

      <button class="btn bg-white badge-pill btn-success-rm m-0 border shadow-sm" style="" wire:click="enterMode('create')">
        <i class="fas fa-list mr-1"></i>
        List
      </button>

    @endif
    <button class="btn btn-warning m-0 float-right"
        style="">
      Nav menu
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

  @if ($modes['create'])
    @livewire ('cms.nav-menu-create')
  @elseif ($modes['display'])
    @livewire ('cms.nav-menu-display', ['cmsNavMenu' => $displayingCmsNavMenu,])
  @else
    @livewire ('cms.nav-menu-list')
  @endif
</div>

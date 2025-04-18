<div>
  
  <x-base-component moduleName="Gallery">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listMode'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('createMode')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Create',
            'btnCheckMode' => 'createMode',
        ])
      @endif

      @if ($modes['listMode'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="postToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['createMode'])
        @livewire('cms.dashboard.gallery-create')
      @elseif ($modes['displayMode'])
        @livewire('cms.dashboard.gallery-display', ['gallery' => $displayingGallery,])
      @elseif ($modes['listMode'])
        @livewire('cms.dashboard.gallery-list')
      @elseif ($modes['updateMode'])
        @livewire('cms.dashboard.gallery-update', ['gallery' => $updatingGallery,])
      @else
        @livewire('cms.dashboard.gallery-list')
      @endif

      @if ($deleteMode)
        @livewire('cms.dashboard.gallery-delete-confirm', ['deletingGallery' => $deletingGallery,])
      @endif

    </div>
  </x-base-component>

</div>

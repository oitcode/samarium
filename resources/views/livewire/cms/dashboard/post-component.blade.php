<div>
  
  <x-base-component moduleName="Posts">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listPostMode'] || !array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createPostMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'createPostMode',
      ])
      @endif
    </x-slot>

    <div>

      {{--
      |
      | Use required component as per mode.
      |
      --}}

      @if ($modes['createPostMode'])
        @livewire ('cms.dashboard.webpage-create', ['is_post' => 'yes',])
      @elseif ($modes['listPostMode'])
        @livewire ('cms.dashboard.post-list')
      @elseif ($modes['displayPostMode'])
        @livewire ('cms.dashboard.webpage-display', ['webpage' => $displayingPost,])
      @elseif ($modes['createPostCategoryMode'])
        @livewire ('cms.dashboard.post-category-create')
      @else
        @livewire ('cms.dashboard.post-list')
      @endif

    </div>
  </x-base-component>

</div>

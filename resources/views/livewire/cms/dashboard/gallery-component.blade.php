<div class="">

  {{-- Top tool bar --}}
  <div class="mb-3 p-2 d-none d-md-block bg-dark">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @if ($modes['displayMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Gallery display',
          'btnCheckMode' => 'displayMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  <div class="">

    @if ($modes['createMode'])
      @livewire('cms.dashboard.gallery-create')
    @elseif ($modes['displayMode'])
      @livewire('cms.dashboard.gallery-display', ['gallery' => $displayingGallery,])
    @elseif ($modes['listMode'])
      @livewire('cms.dashboard.gallery-list')
    @elseif ($modes['updateMode'])
      @livewire('cms.dashboard.gallery-update', ['gallery' => $updatingGallery,])
    @endif

    @if ($deleteMode)
      @livewire('cms.dashboard.gallery-delete-confirm', ['deletingGallery' => $deletingGallery,])
    @endif

  </div>

</div>

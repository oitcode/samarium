<div class="">

  @if (false)
  <x-component-header>
    Gallery
  </x-component-header>
  @endif

  {{-- Top tool bar --}}

  {{-- Show in bigger screen --}}
  <x-toolbar-classic toolbarTitle="Gallery">

    @include ('partials.dashboard.spinner-button')

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
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>

  {{-- Show in smaller screens --}}
  <div class="mb-3 p-2 d-md-none bg-dark-rm">

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

    <div class="d-inline-block float-right">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog text-secondary"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="font-size: 1rem;">
          <button class="dropdown-item py-2" wire:click="clearModes">
            <i class="fas fa-eraser text-primary mr-2"></i>
            Clear modes
          </button>
        </div>
      </div>
    </div>


    @if ($modes['displayMode'])
      <div class="my-2">
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Gallery display',
            'btnCheckMode' => 'displayMode',
        ])
      </div>
    @endif

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

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

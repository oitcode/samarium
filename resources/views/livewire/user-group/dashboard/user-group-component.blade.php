<div class="mb-4">

  {{-- Toolbar --}}
  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="User group">
    @include ('partials.dashboard.spinner-button')
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createUserGroupMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createUserGroupMode',
    ])
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listUserGroupMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listUserGroupMode',
    ])
    @if ($modes['displayUserGroupMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'User display',
          'btnCheckMode' => 'displayUserGroupMode',
      ])
    @endif
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
  </x-toolbar-classic>

  @if (session()->has('message'))

    {{--
    |
    | Flash message div.
    |
    --}}

    @if (session()->has('message'))
      @include ('partials.flash-message', ['message' => session('message'),])
    @endif
  @endif

  @if ($modes['createUserGroupMode'])
    @livewire ('user-group.dashboard.user-group-create')
  @elseif ($modes['listUserGroupMode'])
    @livewire ('user-group.dashboard.user-group-list')
  @elseif ($modes['displayUserGroupMode'])
    @livewire ('user-group.dashboard.user-group-display', ['userGroup' => $displayingUserGroup,])
  @endif

</div>

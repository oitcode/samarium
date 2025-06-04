<div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-classic toolbarTitle="Users">
    @include ('partials.dashboard.spinner-button')
    @if (! array_search(true, $modes) || $modes['listUserMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createUserMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'createUserMode',
      ])
    @endif

    @if (! array_search(true, $modes) || $modes['listUserMode'])
      <x-toolbar-dropdown-component toolbarButtonDropdownId="userToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
    @endif
  </x-toolbar-classic>

  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif

  {{--
  | 
  | Show required components as per mode
  |
  --}}

  @if ($modes['createUserMode'])
    @livewire ('user.dashboard.user-create')
  @elseif ($modes['listUserMode'])
    @livewire ('user.dashboard.user-list')
  @elseif ($modes['displayUserMode'])
    @livewire ('user.dashboard.user-display', ['user' => $displayingUser,])
  @else
    @livewire ('user.dashboard.user-list')
  @endif

</div>

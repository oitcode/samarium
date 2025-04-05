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

    <x-toolbar-dropdown-component toolbarButtonDropdownId="userToolbarDropdown">
      <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
        Search
      </x-toolbar-dropdown-item-component>
    </x-toolbar-dropdown-button>
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
    @livewire ('user.user-create')
  @elseif ($modes['listUserMode'])
    @livewire ('user.user-list')
  @elseif ($modes['displayUserMode'])
    @livewire ('user.user-display', ['user' => $displayingUser,])
  @else
    @livewire ('user.user-list')
  @endif

</div>

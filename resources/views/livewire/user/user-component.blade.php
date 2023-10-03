<div class="mb-4">

  @if (false)
  <x-component-header>
    User
  </x-component-header>
  @endif

  {{-- Toolbar --}}
  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Users">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createUserMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createUserMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listUserMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listUserMode',
    ])

    @if ($modes['displayUserMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'User display',
          'btnCheckMode' => 'displayUserMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>


  @if (session()->has('message'))
    {{-- Flash message div --}}
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-success" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  @if ($modes['createUserMode'])
    @livewire ('user.user-create')
  @elseif ($modes['listUserMode'])
    @livewire ('user.user-list')
  @elseif ($modes['displayUserMode'])
    @livewire ('user.user-display', ['user' => $displayingUser,])
  @endif

</div>

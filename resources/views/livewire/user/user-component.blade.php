<div class="mb-4">

  {{-- Toolbar --}}
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

  </x-toolbar-classic>


  {{-- Flash message div --}}
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


  {{-- Show required components as per mode --}}
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

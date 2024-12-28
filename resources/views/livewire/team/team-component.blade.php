<div>


  {{--
     |
     | Top tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Team">

    @include ('partials.dashboard.spinner-button')

    @if (! array_search(true, $modes) || $modes['listMode'])
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createMode',
    ])
    @endif

    @if ($modes['displayMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
    @endif

  </x-toolbar-classic>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Use the required component as per mode
     |
  --}}

  @if ($modes['createMode'])
    @livewire ('team.team-create')
  @elseif ($modes['listMode'])
    @livewire ('team.team-list')
  @elseif ($modes['displayMode'])
    @livewire ('team.team-display', ['team' => $displayingTeam, 'displayTeamName' => false,])
  @else
    @livewire ('team.team-list')
  @endif


</div>

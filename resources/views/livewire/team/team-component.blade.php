<div>
  {{-- Top tool bar --}}
  <div class="mb-3 d-none d-md-block">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>


  @if ($modes['createMode'])
    @livewire ('team.team-create')
  @elseif ($modes['listMode'])
    @livewire ('team.team-list')
  @elseif ($modes['displayMode'])
    @livewire ('team.team-display', ['team' => $displayingTeam,])
  @endif

</div>

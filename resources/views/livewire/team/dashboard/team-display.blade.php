<div>

  {{--
     |
     | Tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="{{ $team->name }}">
    @include ('partials.dashboard.spinner-button')
    @if (! $modes['updateTeamMemberMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createTeamMemberMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Add team member',
          'btnCheckMode' => 'createTeamMemberMode',
      ])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createTeamMembersFromCsvMode')",
          'btnIconFaClass' => 'fas fa-file',
          'btnText' => 'Upload from csv',
          'btnCheckMode' => 'createTeamMembersFromCsvMode',
      ])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('updateTeamMode')",
          'btnIconFaClass' => 'fas fa-pencil-alt',
          'btnText' => 'Update team',
          'btnCheckMode' => 'updateTeamMode',
      ])
    @else
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Team member display',
          'btnCheckMode' => 'updateTeamMemberMode',
      ])
    @endif
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
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
     | Use required component as per mode
     |
  --}}

  @if ($modes['createTeamMemberMode'])
    @livewire ('team.dashboard.team-display-team-member-create', ['team' => $team,])
  @elseif ($modes['createTeamMembersFromCsvMode'])
    @livewire ('team.dashboard.team-display-team-members-create-from-csv', ['team_id' => $team->team_id,])
  @elseif ($modes['updateTeamMode'])
    @livewire ('team.dashboard.team-update', ['team' => $team,])
  @elseif ($modes['updateTeamMemberMode'])
    @livewire ('team.dashboard.team-display-team-member-update', ['teamMember' => $updatingTeamMember,])
  @else
    {{-- Members --}}
    <div>
      <div class="row">
        @foreach ($team->teamMembers()->orderBy('position')->get() as $teamMember)
          <div class="col-md-3 mb-4">
            @include ('partials.team.person-display', ['person' => $teamMember,])
          </div>
        @endforeach
      </div>
    </div>
  @endif

</div>

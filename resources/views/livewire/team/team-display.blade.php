<div class="p-3 bh-white border">
    <div class="d-flex flex-column">
      @if ($team->image_path)
        <div class="my-3">
          <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
        </div>
      @endif
      <h2 class="h2 mb-4 text-dark font-weight-bold">
        {{ $team->name }}
      </h2>
    </div>


    {{-- Top tool bar --}}
    <div class="mb-4 d-none d-md-block">
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

      @include ('partials.dashboard.spinner-button')

      <div class="clearfix">
      </div>
    </div>

    @if ($modes['createTeamMemberMode'])
      @livewire ('team.team-display-team-member-create', ['team' => $team,])
    @elseif ($modes['createTeamMembersFromCsvMode'])
      @livewire ('team.team-display-team-members-create-from-csv', ['team_id' => $team->team_id,])
    @elseif ($modes['updateTeamMode'])
      @livewire ('team.team-update', ['team' => $team,])
    @elseif ($modes['updateTeamMemberMode'])
      @livewire ('team.team-display-team-member-update', ['teamMember' => $updatingTeamMember,])
    @else
      {{-- Members --}}
      <div class="my-4">
        <h3 class="h4">
          Team members
        </h3>
      </div>

      @if (false)
      @include ('partials.team-display', ['team' => $team, 'displayTeamName' => false,])
      @endif

      <div>
        @if ($displayTeamName ?? true)
        <h3 class="my-4">
          {{ $team->name }}
        </h3>
        @endif
      
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

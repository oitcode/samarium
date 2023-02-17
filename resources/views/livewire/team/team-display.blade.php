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
      @include ('partials.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createTeamMemberMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Add team member',
          'btnCheckMode' => 'createTeamMemberMode',
      ])

      @include ('partials.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createTeamMembersFromCsvMode')",
          'btnIconFaClass' => 'fas fa-file',
          'btnText' => 'Upload from csv',
          'btnCheckMode' => 'createTeamMembersFromCsvMode',
      ])

      @include ('partials.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('updateTeamMode')",
          'btnIconFaClass' => 'fas fa-pencil-alt',
          'btnText' => 'Update team',
          'btnCheckMode' => 'updateTeamMode',
      ])

      @include ('partials.spinner-button')

      <div class="clearfix">
      </div>
    </div>

    @if ($modes['createTeamMemberMode'])
      @livewire ('team.team-display-team-member-create', ['team' => $team,])
    @elseif ($modes['createTeamMembersFromCsvMode'])
      @livewire ('team.team-display-team-members-create-from-csv', ['team_id' => $team->team_id,])
    @elseif ($modes['updateTeamMode'])
      @livewire ('team.team-update', ['team' => $team,])
    @else
      {{-- Members --}}
      <div class="my-4">
        <h3 class="h4">
          Team members
        </h3>
      </div>

      @include ('partials.team-display', ['team' => $team, 'displayTeamName' => false,])

    @endif
</div>

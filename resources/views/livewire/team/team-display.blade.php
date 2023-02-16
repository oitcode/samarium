<div class="p-3 bh-white border">
    <h2 class="h5 mb-4">
      {{ $team->name }}
    </h2>

    {{-- Top tool bar --}}
    <div class="mb-4 d-none d-md-block">
      @include ('partials.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createTeamMemberMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Add team member',
          'btnCheckMode' => 'createTeamMemberMode',
      ])

      @include ('partials.spinner-button')

      <div class="clearfix">
      </div>
    </div>

    @if ($modes['createTeamMemberMode'])
      @livewire ('team.team-display-team-member-create', ['team' => $team,])
    @else
      {{-- Members --}}
      <div class="my-4">
        <h3 class="h4">
          Team members
        </h3>
      </div>

      @include ('partials.team-display', ['team' => $team,])

      @if (false)
      <div class="my-4">
        @if (count($team->teamMembers) > 0)
          @foreach ($team->teamMembers as $teamMember)
          <div class="my-2">
            {{ $teamMember->name }}
            @if ($teamMember->image_path)
              <div class="d-flex justify-content-start mb-3">
                <img src="{{ asset('storage/' . $teamMember->image_path) }}" class="img-fluid" style="height: 50px;">
              </div>
            @endif
          </div>
          @endforeach
        @else
          <div class="text-secondary">
            <i class="fas fa-exclamation-circle mr-2"></i>
            No members
          </div>
        @endif
      </div>
      @endif
    @endif
</div>

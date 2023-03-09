<div>
  @if ($displayTeamName ?? true)
  <h3 class="my-4">
    {{ $team->name }}
  </h3>
  @endif

  <div class="row">
  
    @foreach ($team->teamMembers as $teamMember)
      <div class="col-6 col-md-3 mb-4">
        @include ('partials.team.person-display-fe', ['person' => $teamMember,])
      </div>
    @endforeach
  </div>
</div>

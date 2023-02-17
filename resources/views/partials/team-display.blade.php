<div>
  @if ($displayTeamName)
  <h3 class="my-4">
    {{ $team->name }}
  </h3>
  @endif

  <div class="row">
  
    @foreach ($team->teamMembers as $teamMember)
      <div class="col-md-3 mb-4">
        @include ('partials.person-display', ['person' => $teamMember,])
      </div>
    @endforeach
  </div>
</div>

<div>
  @if (($displayTeamName ?? true) )
    @if ($team->name == 'Quick contacts')
      <h2 class="h4 my-4">
        Important contacts
      </h2>
    @else
      <h3 class="my-4">
        {{ $team->name }}
      </h3>
    @endif
  @endif

  <div class="row">
  
    @foreach ($team->teamMembers()->orderBy('position')->get() as $teamMember)
      <div class="col-6 col-md-3 mb-4">
        @include ('partials.team.person-display-fe', ['person' => $teamMember,])
      </div>
    @endforeach
  </div>
</div>

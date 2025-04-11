<div>
  @if (($displayTeamName ?? true) )
    @if ($team->name == 'Quick contacts')
      <h2 class="h5 o-heading my-5">
        Important contacts
      </h2>
    @else
      <h2 class="h5 font-weight-bold my-4">
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

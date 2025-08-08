<div>
  @if (($displayTeamName ?? true) )
    @if ($team->name == 'Quick contacts')
      <h2 class="h4 text-dark-rm o-heading my-5">
          <i class="fas fa-user-circle mr-1"></i>
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
      <div class="col-12 col-md-4 mb-4">
        @include ('partials.team.person-display-fe', ['person' => $teamMember,])
      </div>
    @endforeach
  </div>
</div>

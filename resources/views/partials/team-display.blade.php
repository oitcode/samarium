<div class="row">
  @foreach ($team->teamMembers as $teamMember)
    <div class="col-md-3 mb-4">
      @include ('partials.person-display', ['person' => $teamMember,])
    </div>
  @endforeach
</div>

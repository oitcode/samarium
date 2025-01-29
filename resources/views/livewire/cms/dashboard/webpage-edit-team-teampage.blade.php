<div>

  <div class="form-group">
    <select class="form-control" wire:model="team_id">
      <option value="---">---</option>
      @foreach ($teams as $team)
        <option value="{{ $team->team_id }}">{{ $team->name }}</option>
      @endforeach
    </select>
    @error ('team_id')
      <div class="text-danger">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageEditTeamTeampageCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>

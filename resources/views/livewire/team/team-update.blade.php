<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 style="font-size: 1.3rem;">
      Update team
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name"
          style="font-size: 1.3rem;">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Team type</label>
      <select class="form-control" wire:model="team_type">
        <option>---</option>
        <option value="playing_team">Playing Team</option>
        <option value="organizing_team">Organizing Team</option>
      </select>
      @error ('team_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Comment</label>
      <input type="text"
          class="form-control"
          wire:model="comment"
          style="font-size: 1.3rem;">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Logo</label>
      @if ($team->image_path)
        <div class="d-flex justify-content-start mb-3">
          <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
        </div>
      @endif
      <input type="file" class="form-control" wire:model.live="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="p-3 m-0">
      @include ('partials.button-update')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitUpdateTeamMode',])
      @include ('partials.spinner-border')
    </div>
  </div>


</div>

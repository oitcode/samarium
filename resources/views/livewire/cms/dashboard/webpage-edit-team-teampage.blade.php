<div>
    <div class="form-group">
      <select class="form-control" wire:model.defer="team_id">
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
      <button class="btn btn-sm btn-success" wire:click="store">
        Save
      </button>
      <button class="btn btn-sm btn-danger" wire:click="$emit('webpageEditTeamTeampageCancel')">
        Cancel
      </button>
    </div>
</div>

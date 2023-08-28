<div>
  <div class="form-group">
    <label for="">Allows appointments</label>
    <select class="form-control" wire:model.defer="allows_appointments">
      <option value="---">---</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
    @error ('allows_appointments') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @if (! $modes['addAvailabilityMode'])
    <div class="bg-white p-2 border mb-3">
      <button class="btn btn-outline-primary" wire:click="enterMode('addAvailabilityMode')">
        Add availablility
      </button>
    </div>
  @endif

  @if ($modes['addAvailabilityMode'])
    <div class="my-3">
      @livewire ('team.dashboard.team-member-add-availability', ['teamMember' => $teamMember,])
    </div>
  @endif

  <div class="bg-white border">
    <h2 class="h4 p-3 mb-0 border">
      Availability
    </h2>
    @foreach ($timing as $key => $val)
      <div class="row p-2 border" style="margin: auto;">
        <div class="col-md-6">
          <div class="form-check">
            <label class="form-check-label" for="defaultCheck1">
              {{ strtoupper($key) }}
            </label>
          </div>
        </div>
        <div class="col-md-6">
          9:00 AM - 5:00 PM
        </div>
      </div>
    @endforeach

  </div>
</div>

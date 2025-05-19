<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalTeamCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>ID</th>
      <th>Team</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($teams as $team)
        <x-table-row-component>
          <td>
            {{ $team->team_id }}
          </td>
          <td>
            @if ($team->image_path)
              <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
            @endif
            <span>
              {{ $team->name }}
            </span>
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingTeam->team_id == $team->team_id)
                <button class="btn btn-danger mr-1" wire:click="deleteTeam">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteTeam">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingTeam->team_id == $team->team_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Team cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteTeam">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayTeam', { teamId: {{ $team->team_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayTeam', { teamId: {{ $team->team_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteTeam({{ $team->team_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $teams->links() }}
    </x-slot>
  </x-list-component>

</div>

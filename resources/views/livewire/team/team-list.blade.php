<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $teamsCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>Team</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($teams as $team)
        <tr>
          <td>
            @if ($team->image_path)
              <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
            @endif
            <span>
              {{ $team->name }}
            </span>
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayTeam', { team: {{ $team }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayTeam', { team: {{ $team }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="deleteTeam({{ $team }})">
              <i class="fas fa-trash"></i>
            </button>
            @if ($modes['delete'])
              @if ($deletingTeam->team_id == $team->team_id)

                @if ($modes['cannotDelete'])
                  <span class="text-danger mr-3">
                    Cannot be deleted
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteTeamCancel">
                    Cancel
                  </span>
                @else
                  <span class="btn btn-danger mr-3" wire:click="confirmDeleteTeam">
                    Confirm delete
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteTeamCancel">
                    Cancel
                  </span>
                @endif

              @endif
            @endif
          </td>
        </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $teams->links() }}
    </x-slot>
  </x-list-component>

</div>

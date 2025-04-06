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
        <x-table-row-component>
          <td>
            @if ($team->image_path)
              <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
            @endif
            <span>
              {{ $team->name }}
            </span>
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayTeam', { teamId: {{ $team->team_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayTeam', { teamId: {{ $team->team_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
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
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $teams->links() }}
    </x-slot>
  </x-list-component>

</div>

<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          <i class="fas fa-filter mr-2"></i>
          @endif
        </div>
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $teamsCount }}
    </div>
  </div>
  @endif


  @if ($searchResultTeams != null && count($searchResultTeams))
    {{-- Show in bigger and smaller screens --}}
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Team
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($searchResultTeams as $team)
            <tr>
              <td>
                @if ($team->image_path)
                  <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
                @endif
                <span wire:click="$emit('displayTeam', {{ $team }})" role="button">
                  {{ $team->name }}
                </span>
              </td>
              <td>
                <button class="btn mr-3" wire:click="">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  @endif

  @if ($teams != null && count($teams) > 0)
    @if (true)
    {{-- Show in bigger and smaller screens --}}
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Team
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($teams as $team)
            <tr>
              <td>
                @if ($team->image_path)
                  <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid" style="height: 50px;">
                @endif
                <span wire:click="$emit('displayTeam', {{ $team }})" role="button">
                  {{ $team->name }}
                </span>
              </td>
              <td>
                <button class="btn mr-3" wire:click="deleteTeam({{ $team }})">
                  <i class="fas fa-trash-alt"></i>
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
        </tbody>
      </table>

    </div>
    @endif

    {{-- Pagination links --}}
    {{ $teams->links() }}
  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No teams
    </div>
  @endif


</div>

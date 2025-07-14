<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $team->name }}
    </div>
    <div class="h5">
      {{ $team->created_at }}
    </div>
  </div>

  {{--
     |
     | Tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="{{ $team->name }}">
    @include ('partials.dashboard.spinner-button')
    @if (! $modes['updateTeamMemberMode'])
      <x-toolbar-button-component btnBsClass="btn-light mr-3" btnClickMethod="enterMode('createTeamMemberMode')">
        <i class="fas fa-plus-circle"></i>
        Add team member
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light mr-3" btnClickMethod="enterMode('createTeamMembersFromCsvMode')">
        <i class="fas fa-file"></i>
        Upload from CSV
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light mr-3" btnClickMethod="enterMode('updateTeamMode')">
        <i class="fas fa-pencil-alt"></i>
        Update team
      </x-toolbar-button-component>
    @else
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Team member display',
          'btnCheckMode' => 'updateTeamMemberMode',
      ])
    @endif
    <x-toolbar-button-component btnBsClass="btn-light mr-3" btnClickMethod="closeThisComponent">
      <i class="fas fa-times-circle text-danger"></i>
      Close
    </x-toolbar-button-component>
  </x-toolbar-classic>

  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['createTeamMemberMode'])
    @livewire ('team.dashboard.team-display-team-member-create', ['team' => $team,])
  @elseif ($modes['createTeamMembersFromCsvMode'])
    @livewire ('team.dashboard.team-display-team-members-create-from-csv', ['team_id' => $team->team_id,])
  @elseif ($modes['updateTeamMode'])
    @livewire ('team.dashboard.team-update', ['team' => $team,])
  @elseif ($modes['updateTeamMemberMode'])
    @livewire ('team.dashboard.team-display-team-member-update', ['teamMember' => $updatingTeamMember,])
  @else
    {{-- Members --}}
    <div>
      <div class="row">
        @foreach ($team->teamMembers()->orderBy('position')->get() as $teamMember)
          <div class="col-md-3 mb-4">
            @include ('partials.team.person-display', ['person' => $teamMember,])
          </div>
        @endforeach
      </div>
    </div>
  @endif

</div>

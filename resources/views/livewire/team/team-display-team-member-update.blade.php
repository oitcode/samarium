<div>


  @if (false)
    <h1 class="font-weight-bold mb-3">
      Update team member
    </h1>
  @endif

  <div class="row mb-4">
    <div class="col-md-6">
      <div class="row mb-1">
        <div class="col-md-12 d-flex flex-column">
          <div class="mb-4">
            @if ($modes['editNameMode'])
              <div class="bg-white p-3">
                @livewire ('team.dashboard.team-member-edit-name', ['teamMember' => $teamMember,])
              </div>
            @else
              <div class="bg-primary text-white p-2">
                <div class="d-flex justify-content-between p-2 m-0">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Name
                    </div>
                    <div class="h5">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->name }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3">
                    <div class="h3" style="">
                      <button class="btn mx-3" wire:click="enterMode('editNameMode')">
                        <span class="text-white">
                          Edit
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="mb-4">
            @if ($modes['editPhoneMode'])
              <div class="bg-white p-3">
                @livewire ('team.dashboard.team-member-edit-phone', ['teamMember' => $teamMember,])
              </div>
            @else
              <div class="bg-white p-2">
                <div class="d-flex justify-content-between p-2 m-0">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Phone
                    </div>
                    <div class="h5">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->phone }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3">
                    <div class="h3">
                      <button class="btn mx-3" wire:click="enterMode('editPhoneMode')">
                        <span class="text-muted">
                          Edit
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="flex-grow-1">
            @if ($modes['editEmailMode'])
              <div class="bg-white p-3">
                @livewire ('team.dashboard.team-member-edit-email', ['teamMember' => $teamMember,])
              </div>
            @else
              <div class="bg-white p-2">
                <div class="d-flex justify-content-between p-2 m-0">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Email
                    </div>
                    <div class="h6">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->email }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3">
                    <div class="h3">
                      <button class="btn mx-3" wire:click="enterMode('editEmailMode')">
                        <span class="text-muted">
                          Edit
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">

      <div class="d-flex flex-column h-100 bg-white">
        @if ($modes['editPictureMode'])
          <div class="bg-white p-3">
            @livewire ('team.dashboard.team-member-edit-picture', ['teamMember' => $teamMember,])
          </div>
        @else
          <div class="bg-white p-2">
            <div class="d-flex justify-content-between p-2 m-0" style="">
              <div class="px-3 flex-grow-1" style="">
          
                <div class="mb-4 h6">
                  Picture
                </div>
                <div class="h6">
                  @if ($teamMember->image_path)
                    <img class="img-fluid" src="{{ asset('storage/' . $teamMember->image_path) }}" alt="{{ $teamMember->name }}" style="max-height: 150px;">
                  @else
                    <i class="fas fa-user fa-10x"></i>
                  @endif
                </div>
              </div>
          
              <div class="d-flex flex-column justify-content-center p-2 px-3">
                <div class="h3">
                  <button class="btn mx-3" wire:click="enterMode('editPictureMode')">
                    <span class="text-muted">
                      Edit
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endif
        <div class="mb-4 bg-white flex-grow-1">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-center h-100">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="my-5">
    <div class="border-top">
      <h2 class="h3 font-weight-bold mt-2 p-3">
        Appointment
      </h2>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="p-0">
          @livewire ('team.dashboard.team-member-appointment-list', ['teamMember' => $teamMember,])
        </div>
      </div>
      <div class="col-md-6">
          @livewire ('team.dashboard.team-member-appointment-setting', ['teamMember' => $teamMember,])
      </div>
    </div>
  </div>


</div>

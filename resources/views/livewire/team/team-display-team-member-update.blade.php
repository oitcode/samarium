<div>

  @if (false)
  <h1 class="font-weight-bold mb-3" style="font-size: 1.3rem;">
    Update team member
  </h1>
  @endif

  <div class="row mb-4">
    <div class="col-md-6">
      <div class="row mb-1">
        <div class="col-md-12 d-flex flex-column bg-white-rm">
          <div class="mb-4">
            @if ($modes['editNameMode'])
              <div class="bg-white p-3">
                @livewire ('team.dashboard.team-member-edit-name', ['teamMember' => $teamMember,])
              </div>
            @else
              <div class="bg-primary text-white p-2">
                <div class="d-flex flex-column-rm justify-content-between border-rm shadow-rm p-2 m-0" style="">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Name
                    </div>
                    <div class="mt-3-rm h5">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->name }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker-rm" style="">
                    <div class="h3 text-primary-rm" style="">
                      @if (false)
                      <i class="fas fa-user fa-2x-rm mr-2 mt-1"></i>
                      @endif
                      <button class="btn btn-outline-primary-rm mx-3" wire:click="enterMode('editNameMode')">
                        @if (false)
                        <i class="fas fa-pencil-alt"></i>
                        @endif
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
                <div class="d-flex flex-column-rm justify-content-between border-rm shadow-rm p-2 m-0" style="">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Phone
                    </div>
                    <div class="mt-3-rm h5">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->phone }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker-rm" style="">
                    <div class="h3 text-primary-rm" style="">
                      @if (false)
                      <i class="fas fa-phone fa-2x-rm mr-2 mt-1"></i>
                      @endif
                      <button class="btn btn-outline-primary-rm mx-3" wire:click="enterMode('editPhoneMode')">
                        @if (false)
                        <i class="fas fa-pencil-alt"></i>
                        @endif
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
          <div class="mb-4-rm flex-grow-1">
            @if ($modes['editEmailMode'])
              <div class="bg-white p-3">
                @livewire ('team.dashboard.team-member-edit-email', ['teamMember' => $teamMember,])
              </div>
            @else
              <div class="bg-white p-2">
                <div class="d-flex flex-column-rm justify-content-between border-rm shadow-rm p-2 m-0" style="">
                  <div class="px-3 flex-grow-1" style="">
              
                    <div class="mb-4 h6">
                      Email
                    </div>
                    <div class="mt-3-rm h6">
                      <span class="font-weight-bold h5">
                        {{ $teamMember->email }}
                      </span>
                    </div>
                  </div>
              
                  <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker-rm" style="">
                    <div class="h3 text-primary-rm" style="">
                      @if (false)
                      <i class="fas fa-envelope fa-2x-rm mr-2 mt-1"></i>
                      @endif
                      <button class="btn btn-outline-primary-rm mx-3" wire:click="enterMode('editEmailMode')">
                        @if (false)
                        <i class="fas fa-pencil-alt"></i>
                        @endif
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
        <div class="d-flex justify-content-between end p-3">
          <div class="font-weight-bold">
            Icon
          </div>
          <div>
            <button class="btn btn-outline-primary-rm mx-3" wire:click="">
              @if (false)
              <i class="fas fa-pencil-alt"></i>
              @endif
              <span class="text-muted">
                Edit
              </span>
            </button>
          </div>
        </div>
        <div class="mb-4 bg-white flex-grow-1">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-center h-100">
            @if ($teamMember->image_path)
              <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $teamMember->image_path) }}" alt="{{ $teamMember->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
            @else
              <i class="fas fa-user fa-10x"></i>
            @endif
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="my-5">
    <div class="border-top">
      <h2 class="h3 font-weight-bold border-bottom-rm mt-2 p-3 bg-white-rm">
        Appointment
      </h2>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="p-0 bg-white-rm border-rm">
          @livewire ('team.dashboard.team-member-appointment-list', ['teamMember' => $teamMember,])
        </div>
      </div>
      <div class="col-md-6">
          @livewire ('team.dashboard.team-member-appointment-setting', ['teamMember' => $teamMember,])
      </div>
    </div>
  </div>
</div>

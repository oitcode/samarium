<div>

  <div class="row mb-4">
    <div class="col-md-6">
      <div class="bg-white border h-100">

        <div class="px-3-rm mb-3-rm bg-primary-rm p-2 border-bottom" style="{{--background-color: #ddd;--}}">
          <div class="d-flex justify-content-start">
            <div class="">
              @if (false)
              <i class="fas fa-user-circle fa-3x mr-2"></i>
              @endif
            </div>
            <div class="d-flex flex-column justify-content-center">
              <span class="h4-rm font-weight-bold">
                {{ $user->name }}
              </span>
            </div>
          </div>
        </div>


        <div class="table-responsive border-rm bg-warning-success m-0 px-2 pt-2">
          <table class="table table-bordered-rm border-bottom-rm">
            <tbody>
              <tr>
                <th class="border-0 p-0">
                  Name
                </th>
                <td class="border-0 p-0">
                  {{ $user->name }}
                </td>
              </tr>
              <tr>
                <th class="border-0 p-0">
                  Created date
                </th>
                <td class="border-0 p-0">
                  {{ $user->created_at->toDateString() }}
                </td>
              </tr>
              <tr>
                <th class="border-0 p-0">
                  Role
                </th>
                <td class="border-0 p-0">
                  @if ($user->role == 'standard')
                    <span class="badge badge-pill badge-success">
                      Standard
                    </span>
                  @elseif ($user->role == 'admin')
                    <span class="badge badge-pill badge-danger">
                      Admin
                    </span>
                  @else
                    {{ $user->role }}
                  @endif
                </td>
              </tr>
              <tr>
                <th class="border-0 p-0">
                  Last login
                </th>
                <td class="border-0 p-0">
                  ---
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 px-3 bg-white">
      <div class="d-flex justify-content-between p-2 mb-3 border-bottom">
        <div class="d-flex flex-column justify-content-center font-weight-bold">
          Groups
        </div>
        <div>
          <button class="btn btn-light text-primary font-weight-bold" wire:click="enterMode('addUserToGroupMode')">
            Add to a group 
          </button>
        </div>
      </div>

      <div>
        @if ($modes['addUserToGroupMode'])
          @livewire ('user.dashboard.add-user-to-group', ['user' => $user,])
        @else
          @foreach ($user->userGroups as $userGroup)
            <div class="px-2">
              {{ $userGroup->name }}
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>

  @if (false)
  <div class="row">

    <div class="col-md-6">

      <div class="px-3 bg-white h-100">
        <div class="d-flex justify-content-between p-2 mb-3 border-bottom">
          <div class="d-flex flex-column justify-content-center font-weight-bold">
            Entries
          </div>
          <div>
            <button class="btn btn-light text-primary font-weight-bold">
            &nbsp;
            </button>
          </div>
        </div>

        <div class="table-responsive border-rm">
          <table class="table border-bottom-rm">
            <tbody>
              <tr>
                <th class="border-0 p-0">
                  Posts
                </th>
                <td class="border-0 p-0">
                  {{ $userPostCount }}
                </td>
              </tr>
              <tr>
                <th class="border-0 p-0">
                  Webpages
                </th>
                <td class="border-0 p-0">
                  {{ $userWebpageCount }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6 px-3 bg-white">
      <div class="px-3-rm mb-3 bg-primary-rm p-2 border-bottom" style="{{--background-color: #ddd;--}}">
        <div class="d-flex justify-content-start">
          <div class="">
            @if (false)
            <i class="fas fa-user-circle fa-3x mr-2"></i>
            @endif
          </div>
          <div class="d-flex flex-column justify-content-center">
            <span class="h4-rm font-weight-bold">
              {{ $user->name }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

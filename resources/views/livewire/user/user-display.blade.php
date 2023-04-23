<div>
  <div class="row">
    <div class="col-md-8">
      <div class="bg-white p-3 border">

        <div class="px-3-rm mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h4 font-weight-bold">
                User
              </span>
            </div>
            <div>
              <button class="btn mr-2" wire:click="$refresh">
                <i class="fas fa-refresh"></i>
              </button>
              <button class="btn mr-2">
                <i class="fas fa-trash"></i>
              </button>
              <button class="btn mr-2">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="d-flex justify-content-center">
              <div class="d-flex flex-column justify-content-center h-100">
              </div>
            </div>
          </div>
          <div class="col-md-12 d-flex flex-column justify-content-center">

            <div class="table-responsive border-rm">
              <table class="table border-bottom">
                <tbody>
                  <tr>
                    <th>
                      Name
                    </th>
                    <td>
                      {{ $user->name }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Created date
                    </th>
                    <td>
                      {{ $user->created_at->toDateString() }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Role
                    </th>
                    <td>
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
                </tbody>
              </table>
            </div>

            @if (false)
            <div class="my-5">
              <h2 class="h4 font-weight-bold mb-3">
                @if (false)
                <i class="fas fa-comment mr-1"></i>
                @endif
                Description
              </h2>
              <p>
                {{ $user->name }}
              </p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 px-3">
    </div>
  </div>
</div>

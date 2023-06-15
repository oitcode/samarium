<div>

  <div class="row mb-4">
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
              <table class="table border-bottom-rm">
                <tbody>
                  <tr>
                    <th class="border-0">
                      Name
                    </th>
                    <td class="border-0">
                      {{ $user->name }}
                    </td>
                  </tr>
                  <tr>
                    <th class="border-0">
                      Created date
                    </th>
                    <td class="border-0">
                      {{ $user->created_at->toDateString() }}
                    </td>
                  </tr>
                  <tr>
                    <th class="border-0">
                      Role
                    </th>
                    <td class="border-0">
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

  <div class="row">
    <div class="col-md-8">
      <div class="bg-white p-3 border">

        <div class="px-3-rm mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h5 font-weight-bold">
                Entries
              </span>
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
              <table class="table border-bottom-rm">
                <tbody>
                  <tr>
                    <th class="border-0">
                      Sales
                    </th>
                    <td class="border-0">
                      23
                    </td>
                  </tr>
                  <tr>
                    <th class="border-0">
                      Purchase
                    </th>
                    <td class="border-0">
                      34
                    </td>
                  </tr>
                  <tr>
                    <th class="border-0">
                      Expense
                    </th>
                    <td class="border-0">
                      12
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

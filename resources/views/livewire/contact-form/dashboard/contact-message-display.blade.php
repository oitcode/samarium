<div>
  <div class="row">
    <div class="col-md-8">
      <div class="bg-white p-3 border">

        <div class="px-3-rm mb-5">
          <div class="d-flex justify-content-between">
            <div>
              <span class="h4 font-weight-bold">
                Contact message
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
                @if (false)
                <div class="d-flex justify-content-center">
                  <i class="fas fa-user-circle fa-2x"></i>
                </div>
                <div class="d-flex justify-content-center">
                  {{ $contactMessage->created_at->toDateString() }}
                </div>

                @endif
              </div>
            </div>
          </div>
          <div class="col-md-12 d-flex flex-column justify-content-center">
            @if (false)
            <h2 class="h4">
              Sender information
            </h2>
            @endif

            <div class="table-responsive border-rm">
              <table class="table border-bottom">
                <tbody>
                  <tr>
                    <th>
                      <i class="fas fa-user-circle mr-1"></i>
                      Sender Name
                    </th>
                    <td>
                      {{ $contactMessage->sender_name }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-phone mr-1"></i>
                      Sender Phone
                    </th>
                    <td>
                      {{ $contactMessage->sender_phone }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <i class="fas fa-envelope mr-1"></i>
                      Sender Email
                    </th>
                    <td>
                      {{ $contactMessage->sender_email }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="my-5">
              <h2 class="h4 font-weight-bold mb-3">
                <i class="fas fa-comment mr-1"></i>
                Message
              </h2>
              <p>
                {{ $contactMessage->message }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 px-3">
      <div class="bg-white border">
        <div class="table-responsive border-rm">
          <table class="table border-bottom mb-0">
            <tbody>
              <tr>
                <th>
                  <i class="fas fa-reply mr-1"></i>
                  Status
                </th>
                <td>
                  <span class="badge badge-danger badge-pill p-2">
                    New
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

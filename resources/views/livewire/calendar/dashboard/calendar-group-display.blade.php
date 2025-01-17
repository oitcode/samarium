<div>


  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Calendar group
      <i class="fas fa-angle-right mx-2"></i>
      {{ $calendarGroup->calendar_group_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-danger p-3" wire:click="closeThisComponent">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  {{--
     |
     | Calendar group general information
     |
  --}}

  <div>
    <div class="mb-2 h5 font-weight-bold border bg-white">
      <div class="d-flex justify-content-between py-3">
        <div class="pl-3 d-flex flex-column justify-content-center o-heading">
          {{ $calendarGroup->name }}
        </div>
        <div>
          <button class="btn btn-outline-primary mx-3" wire:click="">
            Edit
          </button>
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-white o-heading">
          Calendar group ID
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $calendarGroup->calendar_group_id }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light o-heading">
          Created Date
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $calendarGroup->created_at->toDateString() }}
        </div>
      </div>
    </div>

  </div>


  {{--
     |
     | Delete calendar group
     |
  --}}
  <div class="bg-white border p-3-rm my-3">
    <div class="">
      <div class="d-flex justify-content-between p-3">
        <div>
          <div class="o-heading">
              Delete this calendar group
          </div>
          <div>
            Once you delete, it cannot be undone. Please be sure.
          </div>
        </div>
        <div>
          <button class="btn btn-outline-danger" wire:click="">
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>


</div>

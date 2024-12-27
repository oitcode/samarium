<div>


  {{--
     |
     | Calendar group general information
     |
  --}}

  <div>
    <div class="mb-3 h5 font-weight-bold border bg-white">
      <div class="d-flex justify-content-between py-3">
        <div class="pl-3 d-flex flex-column justify-content-center">
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
        <div class="col-md-2 border p-3 bg-white font-weight-bold">
          Calendar group ID
        </div>
        <div class="col-md-10 border bg-white p-3">
          {{ $calendarGroup->calendar_group_id }}
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="row" style="margin: auto;">
        <div class="col-md-2 border p-3 bg-light font-weight-bold">
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
          <div class="">
            <strong>
              Delete this calendar group
            </strong>
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

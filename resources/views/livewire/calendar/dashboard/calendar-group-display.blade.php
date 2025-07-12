<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading text-white">
      {{ $calendarGroup->name }}
    </div>
    <div class="h5 text-white">
      {{ $calendarGroup->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Calendar group
      <i class="fas fa-angle-right mx-2"></i>
      {{ $calendarGroup->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="closeThisComponent">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  {{--
     |
     | Calendar group general information
     |
  --}}

  <div>
    <div class="mb-0 h5 font-weight-bold border bg-white">
      <div class="d-flex justify-content-between py-3">
        <div class="pl-3 d-flex flex-column justify-content-center o-heading">
          {{ $calendarGroup->name }}
        </div>
        <div>
          <button class="btn btn-light mx-3" wire:click="">
            Edit
          </button>
        </div>
      </div>
    </div>

    <div class="mb-0">
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

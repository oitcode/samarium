<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Link
      <i class="fas fa-angle-right mx-2"></i>
      {{ $urlLink->url_link_id }}
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

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitUrlLinkDisplay')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="bg-white border p-3">
    <div class="mt-3-rm mb-3 h5 font-weight-bold border-rm bg-light-rm py-3" {{-- style="border-left: 5px solid #05a;" --}}>
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      @if (true)
      {{ $urlLink->url }}
      @endif
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Url
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateUrlMode'])
            @livewire ('url-link.dashboard.url-link-edit-url', ['urlLink' => $urlLink,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                <a href="{{ $urlLink->url }}" target="_blank">
                  {{ $urlLink->url }}
                </a>
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateUrlMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Url link ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->url_link_id }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted By
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->creator->name }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-9 border p-3 flex-grow-1-rm">
          @if ($modes['updateDescriptionMode'])
            @livewire ('url-link.dashboard.url-link-edit-description', ['urlLink' => $urlLink,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $urlLink->description }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateDescriptionMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

  </div>

  <div class="bg-white border p-3 my-3">
    <div class="mb-3">
      <h2 class="h5 font-weight-bold">
        User group
      </h2>
    </div>

    <div class="col-md-6 p-0 rounded">

      @if ($modes['editUserGroupMode'])
        @livewire ('url-link.dashboard.url-link-edit-user-group', ['urlLink' => $urlLink,])
      @else
        <div class="d-flex justify-content-between">
          <div>
            @if (count($urlLink->userGroups) > 0)
              @foreach ($urlLink->userGroups as $userGroup)
                <span class="badge badge-primary mr-3">
                  {{ $userGroup->name }}
                </span>
              @endforeach
            @else
              None
            @endif
          </div>

          <button class="btn btn-light border-rm mx-3" wire:click="enterModeSilent('editUserGroupMode')">
            <i class="fas fa-plus-circle"></i>
          </button>
        </div>
      @endif

    </div>
  </div>


  <div class="bg-white border p-3 my-3">

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Delete event --}}
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this url link
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>


</div>

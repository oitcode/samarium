<div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Link
      <i class="fas fa-angle-right mx-2"></i>
      {{ $urlLink->url_link_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitUrlLinkDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ $urlLink->url }}
    </div>

    <div>
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

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Url link ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->url_link_id }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted By
        </div>
        <div class="col-md-9 border p-3">
          {{ $urlLink->creator->name }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-9 border p-3">
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

          <button class="btn btn-light mx-3" wire:click="enterModeSilent('editUserGroupMode')">
            <i class="fas fa-plus-circle"></i>
          </button>
        </div>
      @endif
    </div>
  </div>

  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      {{-- Delete event --}}
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div>
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

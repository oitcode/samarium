<div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      File
      <i class="fas fa-angle-right mx-2"></i>
      {{ $documentFile->document_file_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitDocumentFileDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ $documentFile->name }}
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          DocumentFile
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateNameMode'])
            @livewire ('document-file.dashboard.document-file-edit-name', ['documentFile' => $documentFile,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $documentFile->name }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateNameMode')">
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
          Document File ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->document_file_id }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted By
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->creator->name }}
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
            @livewire ('document-file.dashboard.document-file-edit-description', ['documentFile' => $documentFile,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $documentFile->description }}
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

  <div class="p-3 my-3 bg-white border">
    <div class="mb-3">
      <h2 class="h5 font-weight-bold">
        Action
      </h2>
    </div>
    <div>
      <a href=" {{ route('dashboard-document-file-pdf-display', $documentFile->document_file_id) }}" target="_blank" class="btn btn-primary badge-pill">
        View file
      </a>
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
        @livewire ('document-file.dashboard.document-file-edit-user-group', ['documentFile' => $documentFile,])
      @else
        <div class="d-flex justify-content-between">
          <div>
            @if (count($documentFile->userGroups) > 0)
              @foreach ($documentFile->userGroups as $userGroup)
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
                Delete this document file
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

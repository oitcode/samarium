<div>


  <div class="bg-white border p-3">
    <div class="mt-3-rm mb-3 h5 font-weight-bold border-rm bg-light-rm py-3" {{-- style="border-left: 5px solid #05a;" --}}>
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      @if (true)
      {{ $documentFile->name }}
      @endif
    </div>

    <div class="">
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

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Document File ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->document_file_id }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted By
        </div>
        <div class="col-md-9 border p-3">
          {{ $documentFile->creator->name }}
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
    @if (false)
    {{-- Danger zone --}}
    <div class="mb-3">
      <strong>
        Danger zone
      </strong>
    </div>
    @endif

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Delete event --}}
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
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

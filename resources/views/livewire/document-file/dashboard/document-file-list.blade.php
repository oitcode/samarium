<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif




  <div class="d-flex bg-white border p-3 mb-3">
    <div class="" style="font-size: 1rem;">
      <div class="mr-4">
        Total : {{ $documentFilesCount }}
      </div>
    </div>

    <div wire:loading>
      <div class="spinner-border text-info mx-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>


    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Name
            </th>
            <th>
              File path
            </th>
            <th>
              Description
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @if ($documentFiles != null && count($documentFiles) > 0)
            @foreach ($documentFiles as $documentFile)
              <tr>
                <td>
                {{ $documentFile->name }}
                </td>
                <td class="h6 font-weight-bold" wire:click="$emit('displayDocumentFile', {{ $documentFile }})" role="button">
                  <span>
                    {{ $documentFile->file_path }}
                  </span>
                </td>
                <td>
                {{ $documentFile->description }}
                </td>
                <td>
                  @if (false)
                  <button class="btn btn-primary badge-pill" wire:click="$emit('pdfDisplayDocumentFile', {{ $documentFile }})">
                    View file
                  </button>
                  @endif
                  <a href=" {{ route('dashboard-document-file-pdf-display', $documentFile->document_file_id) }}" target="_blank" class="btn btn-primary badge-pill">
                    View file
                  </a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="4" class="text-danger" style="background-color: #feb;">
                No records.
              </td>
            </tr>
          @endif
        </tbody>
      </table>

    </div>
    @endif

</div>

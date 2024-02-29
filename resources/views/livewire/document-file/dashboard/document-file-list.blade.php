<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          <i class="fas fa-filter mr-2"></i>
          @endif
        </div>
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $documentFilesCount }}
    </div>
  </div>
  @endif


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

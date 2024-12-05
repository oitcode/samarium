<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  @if (true)
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark">
          <th>
            File name
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
              <td>
              {{ $documentFile->description }}
              </td>
              <td>
                <a href=" {{ route('website-document-file-pdf-display', $documentFile->document_file_id) }}" target="_blank" class="mr-3">
                  View file
                </a>
                <a href=" {{ asset('storage/' . $documentFile->file_path) }}" class="mr-3" download="{{ $documentFile->name }}">
                  Download
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

<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Filter div
     |
  --}}
  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $documentFilesCount }}
    </div>
  </div>


    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark">
            <th class="o-heading">
              Name
            </th>
            <th class="o-heading">
              File path
            </th>
            <th class="o-heading">
              Description
            </th>
            <th class="o-heading">
              Groups
            </th>
            <th class="o-heading text-right">
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
                <td class="h6 font-weight-bold" wire:click="$dispatch('displayDocumentFile', { documentFile: {{ $documentFile }} })" role="button">
                  <span>
                    {{ $documentFile->file_path }}
                  </span>
                </td>
                <td>
                {{ $documentFile->description }}
                </td>
                <td>
                  @foreach ($documentFile->userGroups as $userGroup)
                    <span class="badge badge-primary mr-2">
                      {{ $userGroup->name }}
                    </span>
                  @endforeach
                </td>
                <td class="text-right">
                  <a href=" {{ route('dashboard-document-file-pdf-display', $documentFile->document_file_id) }}" target="_blank" class="btn btn-primary badge-pill">
                    View file
                  </a>
                  <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayDocumentFile', { documentFile: {{ $documentFile }} })">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayDocumentFile', { documentFile: {{ $documentFile }} })">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="btn btn-danger px-2 py-1" wire:click="">
                    <i class="fas fa-trash"></i>
                  </button>
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

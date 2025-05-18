<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalDocumentFileCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
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
        Groups
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($documentFiles as $documentFile)
        <x-table-row-component>
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
            @if ($modes['confirmDelete'])
              @if ($deletingDocumentFile->document_file_id == $documentFile->document_file_id)
                <button class="btn btn-danger mr-1" wire:click="deleteDocumentFile">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteDocumentFile">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingDocumentFile->document_file_id == $documentFile->document_file_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Document file cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteDocumentFile">
                  Cancel
                </button>
              @endif
            @endif
            <a href=" {{ route('dashboard-document-file-pdf-display', $documentFile->document_file_id) }}" target="_blank" class="btn btn-light badge-pill">
              View file
            </a>
            <x-list-edit-button-component clickMethod="$dispatch('displayDocumentFile', { documentFileId: {{ $documentFile->document_file_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayDocumentFile', { documentFileId: {{ $documentFile->document_file_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteDocumentFile({{ $documentFile->document_file_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $documentFiles->links() }}
    </x-slot>
  </x-list-component>

</div>

<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $documentFilesCount }}
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
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $documentFiles->links() }}
    </x-slot>
  </x-list-component>

</div>

<div>

  <x-list-component>
    <x-slot name="listInfo">
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Name
      </th>
      <th>
        Country
      </th>
      <th>
        Type
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($educInstitutions as $educInstitution)
        <x-table-row-component>
          <td wire:click="$dispatch('displayEducInstitution',{ educInstitution: {{ $educInstitution }} })" role="button">
          {{ $educInstitution->name }}
          </td>
          <td class="h6 font-weight-bold" wire:click="" role="button">
            <span>
              {{ $educInstitution->country }}
            </span>
          </td>
          <td>
            {{ $educInstitution->institution_type }}
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayEducInstitution',{ educInstitution: {{ $educInstitution }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayEducInstitution',{ educInstitution: {{ $educInstitution }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $educInstitutions->links() }}
    </x-slot>
  </x-list-component>

</div>

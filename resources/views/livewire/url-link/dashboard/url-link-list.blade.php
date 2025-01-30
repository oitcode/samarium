<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $urlLinksCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Link
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
      @foreach ($urlLinks as $urlLink)
        <tr>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })" role="button">
            <span>
              {{ $urlLink->url }}
            </span>
          </td>
          <td wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })" role="button">
          {{ $urlLink->description }}
          </td>
          <td>
            @foreach ($urlLink->userGroups as $userGroup)
              <span class="badge badge-primary mr-2">
                {{ $userGroup->name }}
              </span>
            @endforeach
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })">
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
      {{ $urlLinks->links() }}
    </x-slot>
  </x-list-component>

</div>

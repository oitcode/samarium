<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalUrlLinkCount }}
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
        <x-table-row-component>
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
            @if ($modes['confirmDelete'])
              @if ($deletingUrlLink->url_link_id == $urlLink->url_link_id)
                <button class="btn btn-danger mr-1" wire:click="deleteUrlLink">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteUrlLink">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingUrlLink->url_link_id == $urlLink->url_link_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Url link cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteUrlLink">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayUrlLink', {urlLinkId: {{ $urlLink->url_link_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayUrlLink', {urlLinkId: {{ $urlLink->url_link_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteUrlLink({{ $urlLink->url_link_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $urlLinks->links() }}
    </x-slot>
  </x-list-component>

</div>

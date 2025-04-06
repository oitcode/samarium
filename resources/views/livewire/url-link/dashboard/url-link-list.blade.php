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
            <x-list-edit-button-component clickMethod="$dispatch('displayUrlLink', {urlLinkId: {{ $urlLink->url_link_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayUrlLink', {urlLinkId: {{ $urlLink->url_link_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
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

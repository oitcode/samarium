<div>

  <x-list-component>
    <x-slot name="listInfo">
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Name
      </th>
      <th>
        Author
      </th>
      <th>
        Date
      </th>
      <th>
        Visibility
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($webpages as $webpage)
        <x-table-row-component>
          <td class="h5 font-weight-bold py-4">
            <span>
              {{ $webpage->name }}
            </span>
          </td>
          <td>
            @if ($webpage->creator)
              {{ $webpage->creator->name }}
            @else
              <span class="text-secondary">
                <i class="fas fa-exclamation-circle mr-1"></i>
                Not set
              </span>
            @endif
          </td>
          <td>
            Published
            <br/>
            {{ $webpage->created_at->toDateString() }}
          </td>
          <td>
            @if ($webpage->visibility == 'private')
              <i class="fas fa-user text-secondary mr-2"></i>
              Private
            @elseif ($webpage->visibility == 'public')
              <span class="text-success">
              <i class="fas fa-check-circle mr-2"></i>
                Public
              </span>
            @elseif ($webpage->visibility == null)
              <i class="fas fa-exclamation-circle text-secondary"></i>
            @else
              Whoops!
            @endif
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayWebpage', { webpageId: {{ $webpage->webpage_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayWebpage', { webpageId: {{ $webpage->webpage_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="deleteWebpage({{ $webpage }})">
            </x-list-delete-button-component>
            @if ($modes['delete'])
              @if ($deletingWebpage->webpage_id == $webpage->webpage_id)
                @if ($modes['cannotDelete'])
                  <span class="text-danger mr-3">
                    Cannot be deleted
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteWebpageCancel">
                    Cancel
                  </span>
                @else
                  <span class="btn btn-danger mr-3" wire:click="confirmDeleteWebpage">
                    Confirm delete
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteWebpageCancel">
                    Cancel
                  </span>
                @endif
              @endif
            @endif
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $webpages->links() }}
    </x-slot>
  </x-list-component>

</div>

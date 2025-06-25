<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total webpage: {{ $totalWebpageCount }}
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
          <x-table-cell>
            <span>
              {{ $webpage->name }}
            </span>
          </x-table-cell>
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
            @if ($modes['confirmDelete'])
              @if ($deletingWebpage->webpage_id == $webpage->webpage_id)
                <button class="btn btn-danger mr-1" wire:click="deleteWebpage">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteWebpage">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingWebpage->webpage_id == $webpage->webpage_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Webpage cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteWebpage">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayWebpage', { webpageId: {{ $webpage->webpage_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayWebpage', { webpageId: {{ $webpage->webpage_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteWebpage({{ $webpage->webpage_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $webpages->links() }}
    </x-slot>
  </x-list-component>

</div>

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
        Categories
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
      @foreach ($posts as $post)
        {{-- Show in bigger screens --}}
        <x-table-row-component>
          <td class="h5 font-weight-bold py-4">
            <span class="text-dark">
              {{ \Illuminate\Support\Str::limit($post->name, 60, $end=' ...') }}
            </span>
          </td>
          <td>
            @if ($post->creator)
              {{ $post->creator->name }}
            @else
              <span>
                <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                Not set
              </span>
            @endif
          </td>
          <td>
            @if (count($post->webpageCategories) > 0)
              @foreach ($post->webpageCategories as $postCategory)
                <span class="badge badge-primary mr-3">
                  {{ $postCategory->name }}
                </span>
              @endforeach
            @else
              <i class="fas fa-exclamation-circle text-secondary mr-2"></i>
              None
            @endif
          </td>
          <td>
            Published
            <br/>
            {{ $post->created_at->toDateString() }}
          </td>
          <td>
            @if ($post->visibility == 'private')
              <i class="fas fa-user text-secondary mr-2"></i>
              Private
            @elseif ($post->visibility == 'public')
              <span class="text-success">
              <i class="fas fa-check-circle mr-1"></i>
                Public
              </span>
            @elseif ($post->visibility == null)
              <i class="fas fa-exclamation-circle text-secondary"></i>
            @else
              Whoops!
            @endif
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayPost', { postId: {{ $post->webpage_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayPost', { postId: {{ $post->webpage_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="deleteWebpage({{ $post }})">
            </x-list-delete-button-component>
            @if ($modes['delete'])
              @if ($deletingPost->webpage_id == $post->webpage_id)
                <span class="btn btn-danger mr-3" wire:click="confirmDeletePost">
                  Confirm delete
                </span>
                <span class="btn btn-light mr-3" wire:click="deletePostCancel">
                  Cancel
                </span>
              @endif
            @endif
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $posts->links() }}
    </x-slot>
  </x-list-component>

</div>

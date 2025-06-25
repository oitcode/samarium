<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total post: {{ $totalPostCount }}
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
          <x-table-cell>
            <span class="text-dark">
              {{ \Illuminate\Support\Str::limit($post->name, 60, $end=' ...') }}
            </span>
          </x-table-cell>
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
              <i class="far fa-question-circle text-muted"></i>
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
            @if ($modes['confirmDelete'])
              @if ($deletingPost->webpage_id == $post->webpage_id)
                <button class="btn btn-danger mr-1" wire:click="deletePost">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeletePost">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingPost->webpage_id == $post->webpage_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Post cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeletePost">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayPost', { postId: {{ $post->webpage_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayPost', { postId: {{ $post->webpage_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeletePost({{ $post->webpage_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $posts->links() }}
    </x-slot>
  </x-list-component>

</div>

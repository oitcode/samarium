<div>

  @if (!is_null($posts) && count($posts) > 0)
    {{-- Show in bigger screen --}}
    <div class="d-none d-md-block">
      <div class="table-responsive border">
        <table class="table table-hover table-bordered-rm mb-0">
          <thead>
            <tr class="bg-white text-dark">
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
              <th>
                Action
              </th>
            </tr>
          </thead>

          <tbody class="bg-white">
            @foreach ($posts as $post)
              <tr>
                <td class="h5 font-weight-bold py-4" wire:click="$dispatch('displayPost', { post: {{ $post }} })" role="button">
                  <span class="text-dark">
                    {{ \Illuminate\Support\Str::limit($post->name, 60, $end=' ...') }}
                  </span>
                </td>
                <td>
                  @if ($post->creator)
                    {{ $post->creator->name }}
                  @else
                    <span class="">
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
                <td>
                  <span class="btn btn-light mr-3" wire:click="deletePost({{ $post }})">
                    <i class="fas fa-trash"></i>
                  </span>
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
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- Show in smaller screens --}}
    <div class="d-md-none">

      @foreach ($posts as $post)
        <div class="bg-white border px-3">
          <div class="h4-rm py-4">
            <span  wire:click="$dispatch('displayPost', { post: {{ $post }} })" class="h5 text-dark font-weight-bold" role="button">
              {{ \Illuminate\Support\Str::limit($post->name, 60, $end=' ...') }}
            </span>

            <br/ >
            <br/ >
            Author:
            @if ($post->creator)
              {{ $post->creator->name }}
            @else
              <span class="">
                <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                Not set
              </span>
            @endif

            <br />
            Category:
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

            <br/>
            Published:
            {{ $post->created_at->toDateString() }}

            <br/>
            Visibility:
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
          </div>
          <div>
            <span class="btn btn-light mr-3 mb-3" wire:click="deletePost({{ $post }})">
              <i class="fas fa-trash mr-1"></i>
              Delete post
            </span>
            @if ($modes['delete'])
              @if ($deletingPost->webpage_id == $post->webpage_id)
                <span class="btn btn-danger mr-3 mb-3" wire:click="confirmDeletePost">
                  Confirm delete
                </span>
                <span class="btn btn-light mr-3 mb-3" wire:click="deletePostCancel">
                  Cancel
                </span>
              @endif
            @endif
          </div>
        </div>
      @endforeach
    </div>

    {{-- Pagination links --}}
    <div class="my-4">
      {{ $posts->links() }}
    </div>
  @else
    No posts
  @endif
</div>

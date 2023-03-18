<div>
  @if (!is_null($posts) && count($posts) > 0)
    <div class="table-responsive border">
      <table class="table table-hover table-bordered-rm">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }}">
            <th>
              <input type="checkbox" class="mr-3">
              Name
            </th>
            <th>
              Author
            </th>
            @if (false)
            <th>
              Permalink
            </th>
            @endif
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
              <td class="h4 font-weight-bold py-4">
                <input type="checkbox" class="mr-3">
                <span  wire:click="$emit('displayPost', {{ $post }})" class="text-dark" role="button">
                  {{ $post->name }}
                </span>
              </td>
              <td>
                {{ \Faker\Factory::create()->name() }}
              </td>
              @if (false)
              <td>
                {{ $post->permalink }}
              </td>
              @endif
              <td>
                @foreach ($post->webpageCategories as $postCategory)
                  <span class="badge badge-primary mr-3">
                    {{ $postCategory->name }}
                  </span>
                @endforeach
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
                  <i class="fas fa-globe mr-2"></i>
                    Public
                  </span>
                @elseif ($post->visibility == null)
                  <i class="fas fa-exclamation-circle text-secondary"></i>
                  @if (false)
                  Not set
                  @endif
                @else
                  Whoops!
                @endif
              </td>
              <td>
                <i class="fas fa-pencil-alt"></i>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Pagination links --}}
    <div class="my-4">
      {{ $posts->links() }}
    </div>
  @else
    No posts
  @endif
</div>

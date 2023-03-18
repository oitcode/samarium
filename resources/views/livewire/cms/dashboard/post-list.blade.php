<div>
  @if (!is_null($posts) && count($posts) > 0)
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }}">
            <th>
              Name
            </th>
            <th>
              Permalink
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($posts as $post)
            <tr wire:click="$emit('displayPost', {{ $post }})" role="button">
              <td>
                {{ $post->name }}
              </td>
              <td>
                {{ $post->permalink }}
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
    {{ $posts->links() }}
  @else
    No posts
  @endif
</div>

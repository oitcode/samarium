<div>
  @if (!is_null($posts) && count($posts) > 0)
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="bg-white-rm" style="background-color: #def;">
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
  @else
    No posts
  @endif
</div>

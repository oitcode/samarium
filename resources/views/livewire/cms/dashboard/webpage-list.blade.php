<div>
  @if (!is_null($webpages) && count($webpages) > 0)
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
          @foreach ($webpages as $webpage)
            {{-- Todo: This needs to be in Controller/Livewire php file --}}
            @if ($webpage->is_post == 'yes')
              @continue
            @endif
            <tr wire:click="$emit('displayWebpage', {{ $webpage->webpage_id }})" role="button">
              <td>
                {{ $webpage->name }}
              </td>
              <td>
                {{ $webpage->permalink }}
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
    No webpages
  @endif
</div>

<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Post search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          wire:model="webpage_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>

  @if ($searchDone)
  <x-list-component>
    <x-slot name="listInfo">
      Total: {{ count($webpages) }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Webpage ID
      </th>
      <th>
        Name
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @if ($webpages != null && count($webpages) > 0)
        @foreach ($webpages as $webpage)
          <x-table-row-component>
            <td>
              {{ $webpage->webpage_id }}
            </td>
            <td class="h6" wire:click="$dispatch('displayWebpage', { webpageId : {{ $webpage->webpage_id }} })" role="button">
              {{ \Illuminate\Support\Str::limit($webpage->name, 60, $end=' ...') }}
            </td>
            <td class="text-right">
              <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayPost', { post: {{ $webpage }} })">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayPost', { post: {{ $webpage }} })">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </x-table-row-component>
        @endforeach
      @else
        <td>
          No results
        </td>
      @endif
    </x-slot>

    <x-slot name="listPaginationLinks">
    </x-slot>
  </x-list-component>
  @endif

</div>

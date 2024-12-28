<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Filter div
     |
  --}}
  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $urlLinksCount }}
    </div>
  </div>


    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark">
            <th>
              Link
            </th>
            <th>
              Description
            </th>
            <th>
              Groups
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @if ($urlLinks != null && count($urlLinks) > 0)
            @foreach ($urlLinks as $urlLink)
              <tr>
                <td class="h6 font-weight-bold" wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })" role="button">
                  <span>
                    {{ $urlLink->url }}
                  </span>
                </td>
                <td wire:click="$dispatch('displayUrlLink', {urlLink: {{ $urlLink }} })" role="button">
                {{ $urlLink->description }}
                </td>
                <td>
                  @foreach ($urlLink->userGroups as $userGroup)
                    <span class="badge badge-primary mr-2">
                      {{ $userGroup->name }}
                    </span>
                  @endforeach
                </td>
                <td>
                  <button class="btn btn-primary px-2 py-1" wire:click="">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-success px-2 py-1" wire:click="">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="btn btn-danger px-2 py-1" wire:click="">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">
                No records.
              </td>
            </tr>
          @endif
        </tbody>
      </table>

    </div>
    @endif

</div>

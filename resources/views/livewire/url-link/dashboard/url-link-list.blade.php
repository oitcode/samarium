<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          <i class="fas fa-filter mr-2"></i>
          @endif
        </div>
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $urlLinksCount }}
    </div>
  </div>
  @endif


    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark" style="font-size: 1rem;">
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
                <td class="h6 font-weight-bold" wire:click="$emit('displayUrlLink', {{ $urlLink }})" role="button">
                  <span>
                    {{ $urlLink->url }}
                  </span>
                </td>
                <td wire:click="$emit('displayUrlLink', {{ $urlLink }})" role="button">
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
                  <i class="fas fa-ellipsis-h text-secondary"></i>
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

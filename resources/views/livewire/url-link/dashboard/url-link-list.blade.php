<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif




  <div class="d-flex bg-white border p-3 mb-3">
    <div class="" style="font-size: 1rem;">
      <div class="mr-4">
        Total : {{ $urlLinksCount }}
      </div>
    </div>

    <div wire:loading>
      <div class="spinner-border text-info mx-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>


    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Link
            </th>
            <th>
              Description
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

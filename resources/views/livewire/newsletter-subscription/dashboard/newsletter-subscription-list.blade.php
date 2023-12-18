<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <button wire:loading class="btn" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  <div class="d-flex mb-3 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Total : {{ $newsletterSubscriptionsCount }}
    </div>
  </div>


  @if ($newsletterSubscriptions != null && count($newsletterSubscriptions) > 0)
    @if (true)
    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Email
            </th>
            <th>
              Subscription date
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($newsletterSubscriptions as $newsletterSubscription)
            <tr>
              <td class="h6 font-weight-bold" wire:click="$emit('displayNewsletterSubscription', {{ $newsletterSubscription }})" role="button">
                <span>
                  {{ $newsletterSubscription->email }}
                </span>
              </td>
              <td>
                {{ $newsletterSubscription->created_at->toDateString() }}
              </td>
              <td>
                <i class="fas fa-ellipsis-h text-secondary"></i>
                @if (false)
                <button class="btn mr-3" wire:click="">
                  <i class="fas fa-trash-alt"></i>
                </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    @endif

  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No newsletter subscriptions.
    </div>
  @endif


</div>

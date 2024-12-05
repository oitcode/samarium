<div>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <button wire:loading class="btn">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  {{--
     |
     | Filter div
     |
  --}}

  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $newsletterSubscriptionsCount }}
    </div>
  </div>


  {{--
     |
     | Newsletter subscription list table
     |
  --}}

  @if ($newsletterSubscriptions != null && count($newsletterSubscriptions) > 0)
    @if (true)
    {{-- Show in bigger and smaller screens --}}
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark">
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
              <td class="h6 font-weight-bold" wire:click="$dispatch('displayNewsletterSubscription', { newsletterSubscription: {{ $newsletterSubscription }} })" role="button">
                <span>
                  {{ $newsletterSubscription->email }}
                </span>
              </td>
              <td>
                {{ $newsletterSubscription->created_at->toDateString() }}
              </td>
              <td>
                <i class="fas fa-ellipsis-h text-secondary"></i>
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

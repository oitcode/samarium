<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalNewsletterSubscriptionCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
      <th>
        Subscription date
      </th>
      <th>
        Email
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($newsletterSubscriptions as $newsletterSubscription)
        <x-table-row-component>
          <td>
            {{ $newsletterSubscription->newsletter_subscription_id }}
          </td>
          <td>
            {{ $newsletterSubscription->created_at->toDateString() }}
          </td>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayNewsletterSubscription', { newsletterSubscription: {{ $newsletterSubscription }} })" role="button">
            <span>
              {{ $newsletterSubscription->email }}
            </span>
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingNewsletterSubscription->newsletter_subscription_id == $newsletterSubscription->newsletter_subscription_id)
                <button class="btn btn-danger mr-1" wire:click="deleteNewsletterSubscription">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteNewsletterSubscription">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingNewsletterSubscription->newsletter_subscription_id == $newsletterSubscription->newsletter_subscription_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Newsletter subscription cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteNewsletterSubscription">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayNewsletterSubscription', { newsletterSubscriptionId: {{ $newsletterSubscription->newsletter_subscription_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayNewsletterSubscription', { newsletterSubscriptionId: {{ $newsletterSubscription->newsletter_subscription_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteNewsletterSubscription({{ $newsletterSubscription->newsletter_subscription_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $newsletterSubscriptions->links() }}
    </x-slot>
  </x-list-component>

</div>

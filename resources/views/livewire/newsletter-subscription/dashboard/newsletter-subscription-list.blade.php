<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $newsletterSubscriptionsCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Email
      </th>
      <th>
        Subscription date
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($newsletterSubscriptions as $newsletterSubscription)
        <x-table-row-component>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayNewsletterSubscription', { newsletterSubscription: {{ $newsletterSubscription }} })" role="button">
            <span>
              {{ $newsletterSubscription->email }}
            </span>
          </td>
          <td>
            {{ $newsletterSubscription->created_at->toDateString() }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayNewsletterSubscription', { newsletterSubscriptionId: {{ $newsletterSubscription->newsletter_subscription_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayNewsletterSubscription', { newsletterSubscriptionId: {{ $newsletterSubscription->newsletter_subscription_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
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

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
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayNewsletterSubscription', { newsletterSubscription: {{ $newsletterSubscription }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayNewsletterSubscription', { newsletterSubscription: {{ $newsletterSubscription }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $newsletterSubscriptions->links() }}
    </x-slot>
  </x-list-component>

</div>

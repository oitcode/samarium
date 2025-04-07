<div>
  
  <x-base-component moduleName="Newsletter subscription">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes) || $modes['listMode'])
        <x-toolbar-dropdown-component toolbarButtonDropdownId="newsletterSubscriptionToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['createMode'])
        Whoopsie
      @elseif ($modes['listMode'])
        @livewire ('newsletter-subscription.dashboard.newsletter-subscription-list')
      @elseif ($modes['displayMode'])
        @livewire ('newsletter-subscription.dashboard.newsletter-subscription-display', ['newsletterSubscription' => $displayingNewsletterSubscription,])
      @else
        @livewire ('newsletter-subscription.dashboard.newsletter-subscription-list')
      @endif

    </div>
  </x-base-component>

</div>

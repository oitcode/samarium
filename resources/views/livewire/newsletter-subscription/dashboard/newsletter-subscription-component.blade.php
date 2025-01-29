<div>
  
  <x-base-component moduleName="Newsletter subscription">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')
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

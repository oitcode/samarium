<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $newsletterSubscription->email }}
    </div>
    <div class="h5">
      {{ $newsletterSubscription->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Newsletter subscription
      <i class="fas fa-angle-right mx-2"></i>
      {{ $newsletterSubscription->newsletter_subscription_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitNewsletterSubscriptionDisplay')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="table-responsive bg-white mb-2">
    <table class="table border-bottom border mb-0">
      <tbody>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Email
          </th>
          <td>
            {{ $newsletterSubscription->email }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Subscription ID
          </th>
          <td>
            {{ $newsletterSubscription->newsletter_subscription_id }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Subscription Date
          </th>
          <td>
            {{ $newsletterSubscription->created_at->toDateString() }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-phone mr-1"></i>
            Status
          </th>
          <td>
            Active
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  @if (false)
  {{-- Delete newsletter subscription --}}
  <div class="bg-white border p-3 mb-2">
    <div class="col-md-6 p-3 border rounded">
      <div class="o-heading">
        Delete this newsletter subscription
      </div>
      <div>
        Once you delete, it cannot be undone. Please be sure.
      </div>
    </div>
  </div>
  @endif

</div>

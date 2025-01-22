<div>

  {{--
  |
  | Toolbar.
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
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitNewsletterSubscriptionDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border p-3">

    <div class="mb-3 h5 font-weight-bold py-3">
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ $newsletterSubscription->email }}
    </div>

    <div class="">
      <div class="d-flex">
        <div class="border p-3 bg-light font-weight-bold" style="width: 300px;">
          Email
        </div>
        <div class="border p-3 flex-grow-1">
          {{ $newsletterSubscription->email }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="d-flex">
        <div class="border p-3 bg-light font-weight-bold" style="width: 300px;">
          Subscription ID
        </div>
        <div class="border p-3 flex-grow-1">
          {{ $newsletterSubscription->newsletter_subscription_id }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="d-flex">
        <div class="border p-3 bg-light font-weight-bold" style="width: 300px;">
          Subscription Date
        </div>
        <div class="border p-3 flex-grow-1">
          {{ $newsletterSubscription->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="d-flex">
        <div class="border p-3 bg-light font-weight-bold" style="width: 300px;">
          Status
        </div>
        <div class="border p-3 flex-grow-1">
          Active
        </div>
      </div>
    </div>

  </div>


  {{-- Delete newsletter subscription --}}
  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this newsletter subscription
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

<div>

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white border">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Newsletter subscription
      <i class="fas fa-angle-right mx-2"></i>
      {{ $newsletterSubscription->newsletter_subscription_id }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitNewsletterSubscriptionDisplay')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

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

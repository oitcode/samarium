<div>


  <div class="bg-white border p-3">

    <div class="mt-3-rm mb-3 h5 font-weight-bold border-rm bg-light-rm py-3" {{-- style="border-left: 5px solid #05a;" --}}>
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


  <div class="bg-white border p-3 my-3">
    @if (false)
    {{-- Danger zone --}}
    <div class="mb-3">
      <strong>
        Danger zone
      </strong>
    </div>
    @endif

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Delete event --}}
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

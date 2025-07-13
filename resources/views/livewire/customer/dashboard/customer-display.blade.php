<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $customer->name }}
    </div>
    <div class="h5">
      {{ $customer->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Customer
      <i class="fas fa-angle-right mx-2"></i>
      {{ $customer->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitCustomerDisplayMode')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  {{--
     |
     | Customer basic info
     |
  --}}

  <div class="bg-white border mb-2">
    <div class="table-responsive">
      <table class="table mb-0">
        <tbody>
          <tr>
            <th class="o-heading">Name</th>
            <td>
              @if ($modes['updateNameMode'])
                @livewire ('customer.dashboard.customer-edit-name', ['customer' => $customer,])
              @else
                {{ $customer->name }}
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updateNameMode'])
                <span class="mx-3" wire:click="enterMode('updateNameMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Email</th>
            <td>
              @if ($modes['updateEmailMode'])
                @livewire ('customer.dashboard.customer-edit-email', ['customer' => $customer,])
              @else
                @if ($customer->email)
                  {{ $customer->email}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                    Email unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updateEmailMode'])
                <span class="mx-3" wire:click="enterMode('updateEmailMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Phone</th>
            <td>
              @if ($modes['updatePhoneMode'])
                @livewire ('customer.dashboard.customer-edit-phone', ['customer' => $customer,])
              @else
                @if ($customer->phone)
                  {{ $customer->phone}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                    Phone unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updatePhoneMode'])
                <span class="mx-3" wire:click="enterMode('updatePhoneMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">PAN Num</th>
            <td>
              @if ($modes['updatePanMode'])
                @livewire ('customer.dashboard.customer-edit-pan', ['customer' => $customer,])
              @else
                @if ($customer->pan_num)
                  {{ $customer->pan_num}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                  PAN number unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updatePanMode'])
                <span class="mx-3" wire:click="enterMode('updatePanMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Balance</th>
            <td>
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $customer->getBalance() ); @endphp
            </td>
            <td>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  {{--
     |
     | Sales history
     |
  --}}

  <div class="mb-2 bg-white border p-2">
    <div class="d-flex justify-content-between">
      <h2 class="h6 o-heading">
        Sales
      </h2>
      <div>
        @include ('partials.dashboard.spinner-button')
        <button class="btn btn-primary
            @if ($modes['salesHistory'])
            @endif
            m-0 border"
            wire:click="enterMode('salesHistory')"
            style="min-width: 200px;">
          <i class="fas fa-book mr-1"></i>
          Sales history
        </button>
      </div>
    </div>

    @if ($modes['salesHistory'])
      @livewire ('customer.dashboard.customer-sale-list', ['customer' => $customer,])
    @endif

    @if ($modes['saleInvoiceDisplay'])
      @livewire ('core.dashboard.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
    @endif

    @if ($modes['saleInvoicePaymentCreate'])
      @livewire ('customer.dashboard.customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
    @endif
  </div>

  {{--
     |
     | Settlement
     |
  --}}

  <div class="mb-2 bg-white border p-2">
    <div class="d-flex justify-content-between">
      <h2 class="h6 font-weight-bold" style="font-weight: 900; font-family: arial; color: #123;">
        Settlement
      </h2>
      <div>
        @include ('partials.dashboard.spinner-button')
        <button class="btn btn-primary
            @if ($modes['customerPaymentCreate'])
            @endif
            m-0 border"
            style="min-width: 200px;"
            wire:click="enterMode('customerPaymentCreate')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add settlement
        </button>
      </div>
    </div>

    @if ($modes['customerPaymentCreate'])
      <div class="my-3">
        @livewire ('customer.dashboard.customer-payment-create', ['customer' => $customer,])
      </div>
    @endif
  </div>

  {{--
     |
     | Customer notes
     |
  --}}

  <div class="bg-white border p-2">
    <div class="d-flex justify-content-between">
      <h2 class="h6 font-weight-bold" style="font-weight: 900; font-family: arial; color: #123;">
        Notes
      </h2>
      <div>
        @include ('partials.dashboard.spinner-button')
        <button class="btn btn-primary
            @if ($modes['customerPaymentCreate'])
            @endif
            m-0 border"
            style="min-width: 200px;"
            wire:click="enterMode('customerCommentCreateMode')">
          <i class="fas fa-plus-circle"></i>
          Add a note
        </button>
      </div>
    </div>

    <div>
      @if ($modes['customerCommentCreateMode'])
        <div class="py-3">
          @livewire ('customer.dashboard.customer-comment-create', ['customer' => $customer,])
        </div>
      @else
        @if ($customer->customerComments && count($customer->customerComments) > 0)
          @foreach ($customer->customerComments as $customerCommnet)
            <div class="my-3">
              <div class="mb-1">
                <small>
                  {{ $customerCommnet->created_at->toDateString() }}
                  |
                  {{ $customerCommnet->creator->name }}
                </small>
              </div>
              <div class="border p-2" style="background-color: #feff9c;">
                {{ $customerCommnet->comment_text}}
              </div>
            </div>
          @endforeach
        @else
          <div class="my-3">
            No notes
          </div>
        @endif
      @endif
    </div>
  </div>

</div>

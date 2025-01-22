<div>

  {{--
  |
  | Toolbar.
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
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitCustomerDisplayMode')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="row-rm">
    <div class="col-md-4-rm">

      <div class="bg-white border mb-2">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th>Name</th>
                <td>{{ $customer->name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  @if ($customer->email)
                    {{ $customer->email}}
                  @else
                    <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                    <span class="text-secondary">
                    Email unknown
                    </span>
                  @endif
                </td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>
                  @if ($customer->phone)
                    {{ $customer->phone}}
                  @else
                    <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                    <span class="text-secondary">
                    Phone unknown
                    </span>
                  @endif
                </td>
              </tr>
              <tr>
                <th>PAN Num</th>
                <td>
                  @if ($customer->pan_num)
                    {{ $customer->pan_num}}
                  @else
                    <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                    <span class="text-secondary">
                    PAN number unknown
                    </span>
                  @endif
                </td>
              </tr>
              <tr>
                <th>Balance</th>
                <td>
                  Rs
                  @php echo number_format( $customer->getBalance() ); @endphp
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      @if (false)
      <div class="bg-white border mb-2">

        <div class="d-flex justify-content-between p-3">
          <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
            Applications
          </h2>
          <button class="btn btn-primary" wire:click="enterMode('educApplicationCreateMode')">
            <i class="fas fa-plus-circle"></i>
            Add an application
          </button>
        </div>


        @if ($modes['educApplicationCreateMode'])
          <div class="p-3">
            @livewire ('educ.application.dashboard.application-create', ['customer' => $customer,])
          </div>
        @else
        <div class="table-responsive">
          <table class="table">
              @foreach ($customer->educApplications as $educApplication)
                <tr>
                  <td>
                    {{ $educApplication->educInstitutionProgram->name }}
                  </td>
                  <td>
                    <span class="badge badge-success p-2">
                      In progress
                    </span>
                  </td>
                  <td>
                    <button class="btn-light border">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
          </table>
        </div>
        @endif
      </div>
      @endif

      {{--
         |
         | Sales history
         |
      --}}
      <div class="mb-2 bg-white border p-2">
        <div class="d-flex justify-content-between">
          <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
            Sales
          </h2>
          <div class="mb-3-rm">
            <button wire:loading class="btn m-0">
              <span class="spinner-border text-info mr-3" role="status">
              </span>
            </button>

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
          @livewire ('customer.customer-sale-list', ['customer' => $customer,])
        @endif

        @if ($modes['saleInvoiceDisplay'])
          @livewire ('core.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
        @endif

        @if ($modes['saleInvoicePaymentCreate'])
          @livewire ('customer.customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
        @endif
      </div>
    </div>

    @if (false)
    <div class="col-md-8">
      <div class="bg-white border p-3 mb-3">
        <div class="d-flex justify-content-between">
          <h2 class="h6 font-weight-bold text-secondary">
            View/Edit Remarks
          </h2>
          <button class="btn btn-primary" wire:click="enterMode('customerCommentCreateMode')">
            Add remarks
          </button>
        </div>
        <div class="">
          <button class="btn btn-outline-primary">
            Notes
          </button>
          <button class="btn btn-primary">
            Followups
          </button>
        </div>

        @if ($modes['customerCommentCreateMode'])
          <div class="py-3">
            @livewire ('customer.dashboard.customer-comment-create', ['customer' => $customer,])
          </div>
        @else
          @foreach ($customer->customerComments as $customerCommnet)
            <div class="mb-3">
              <div class="text-right text-muted">
                {{ $customerCommnet->created_at->toDateString() }}
                |
                {{ $customerCommnet->creator->name }}
              </div>
              <div class="border p-2" style="background-color: #eee;">
                {{ $customerCommnet->comment_text}}
              </div>
            </div>
          @endforeach
        @endif

      </div>

      <div class="bg-white border p-3 mb-3">
        <div class="d-flex">
          <div class="mr-2">
            Application Status
          </div>
          <div>
            <span class="badge badge-primary p-1">
              University College Birmingham 
            </span>
          </div>
        </div>
      </div>

      <div class="row" style="margin: auto;">
        <div class="col-md-6">
          <div class="bg-white border p-2">
            <h2 class="h6 font-weight-bold">
              View Documents
            </h2>
            <div class="">
              <button class="btn btn-outline-primary mb-2">
                General
              </button>
              <button class="btn btn-primary mb-2">
                Other docs
              </button>
              <button class="btn btn-primary mb-2">
                Compliace docs
              </button>
              <button class="btn btn-primary mb-2">
                Visa docs
              </button>
            </div>

            <div class="table-responsive">
              <table class="table">
                @foreach ($customer->customerDocumentFiles as $customerDocumentFile)
                  <tr>
                    <td>
                      {{ $customerDocumentFile->name }}
                    </td>
                    <td>
                      <span class="badge badge-success p-2">
                        Approved
                      </span>
                    </td>
                    <td>
                      <button class="btn-light border">
                        <i class="fas fa-eye"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-white border p-2">
            <h2 class="h6 font-weight-bold">
              Upload Documents
            </h2>

            <div class="d-flex justify-content-between">
              <div class="">
                Upload Documents here 
              </div>
              <div class="">
                <button class="btn btn-success" wire:click="enterMode('customerDocumentFileCreateMode')">
                  <i class="fas fa-plus-circle"></i>
                  Add files
                </button>
              </div>
            </div>

            @if ($modes['customerDocumentFileCreateMode'])
              <div class="py-3">
                @livewire ('customer.dashboard.customer-document-file-create', ['customer' => $customer,])
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>


  {{--
     |
     | Settlement
     |
  --}}

  <div class="mb-2 bg-white border p-2">
    <div class="d-flex justify-content-between">
      <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
        Settlement
      </h2>
      <div class="mb-3-rm">
        <button wire:loading class="btn m-0">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>

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
        @livewire ('customer.customer-payment-create', ['customer' => $customer,])
      </div>
    @endif
  </div>


  {{--
     |
     | Customer notes
     |
  --}}

  <div class="my-4-rm bg-white border p-2">
    <div class="d-flex justify-content-between">
      <h2 class="h6 font-weight-bold text-secondary-rm" style="font-weight: 900; font-family: arial; color: #123;">
        Notes
      </h2>
      <div class="mb-3-rm">
        <button wire:loading class="btn m-0">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>

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

<div>

  <div class="d-flex justify-content-between bg-white py-0 mb-2">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2">
      Customer

      <i class="fas fa-angle-right mx-2"></i>
      {{ $customer->name }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$dispatch('exitCustomerDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row" style="margin: auto;">
    <div class="col-md-4">

      <div class="bg-white border mb-3">
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
                    <i class="fas fa-exclamation-circle text-warning mr-1"></i>
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
                    <i class="fas fa-exclamation-circle text-warning mr-1"></i>
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
                    <i class="fas fa-exclamation-circle text-warning mr-1"></i>
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

      <div class="bg-white border">

        <div class="d-flex justify-content-between p-3">
          <h2 class="h6 font-weight-bold text-secondary">
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

      {{-- Toolbar --}}
      <div class="my-4">
        <div class="mb-3">
          <button class="btn
              @if ($modes['salesHistory'])
                {{ config('app.oc_ascent_btn_color') }}
              @endif
              m-0 border shadow-sm badge-pill mr-3"
              wire:click="enterMode('salesHistory')">
            <i class="fas fa-shopping-cart mr-3"></i>
            Sales
          </button>

          <button class="btn
              @if ($modes['customerPaymentCreate'])
                {{ config('app.oc_ascent_btn_color') }}
              @endif
              m-0 border shadow-sm badge-pill mr-3"
              wire:click="enterMode('customerPaymentCreate')">
            <i class="fas fa-key mr-3"></i>
            Settle
          </button>

          <button wire:loading class="btn m-0"
              style="height: 100px; width: 225px;">
            <span class="spinner-border text-info mr-3" role="status">
            </span>
          </button>

          <div class="clearfix">
          </div>
        </div>
      </div>
    </div>
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
  </div>


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['salesHistory'])
    @livewire ('customer.customer-sale-list', ['customer' => $customer,])
  @endif

  @if ($modes['customerPaymentCreate'])
    @livewire ('customer.customer-payment-create', ['customer' => $customer,])
  @endif

  @if ($modes['saleInvoicePaymentCreate'])
    @livewire ('customer.customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
  @endif

  @if ($modes['saleInvoiceDisplay'])
    @livewire ('core.core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif


</div>

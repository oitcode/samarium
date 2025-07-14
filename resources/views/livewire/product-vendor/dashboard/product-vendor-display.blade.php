<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $productVendor->name }}
    </div>
  </div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Product vendor
      <i class="fas fa-angle-right mx-2"></i>
      {{ $productVendor->product_vendor_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitProductVendorDisplay')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      {{ $productVendor->name }}
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Product vendor ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $productVendor->product_vendor_id }}
        </div>
      </div>
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Name
        </div>
        <div class="col-md-9 border p-3">
          {{ $productVendor->name }}
        </div>
      </div>
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Creaeted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $productVendor->created_at->toDateString() }}
        </div>
      </div>
    </div>
  </div>

  @if (false)
  {{-- Delete product vendor --}}
  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div>
              <strong>
                Delete this product vendor
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
  @endif

</div>

<div>


  <div class="d-flex justify-content-between py-2 border bg-white px-2">
    <div>
      <button class="btn btn-light mr-2">
        <i class="fas fa-plus-circle mr-1"></i>
      </button>
      <input type="text" class="mr-2">
      <button class="btn btn-light">
        <i class="fas fa-refresh mr-2"></i>
      </button>
    </div>
    <div>
      <button class="btn btn-light">
        <i class="fas fa-download mr-1"></i>
        Download
      </button>
    </div>
  </div>

  <div class="table-responsive bg-white">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th class="o-heading" >Product Vendor</th>
          <th class="o-heading text-right">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productVendors as $productVendor)
          <tr>
            <td wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )" role="button">
              {{ $productVendor->name }}
            </td>
            <td class="text-right">
              <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Pagination links --}}
  <div class="bg-white border p-2">
    {{ $productVendors->links() }}
  </div>


</div>

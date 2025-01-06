<div>


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


</div>

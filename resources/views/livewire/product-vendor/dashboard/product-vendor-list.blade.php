<div>


  <div class="table-responsive bg-white">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th>Product Vendor</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productVendors as $productVendor)
          <tr>
            <td wire:click="$dispatch('displayProductVendor', { productVendor: {{ $productVendor }} } )" role="button">
              <strong>
                {{ $productVendor->name }}
              </strong>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>

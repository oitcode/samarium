<div>

  <div class="py-2 mb-3 border">
    <h2>
      Share
    </h2>
    @if (false)
    <button class="btn btn-success" wire:click="">
      Facebook
    </button>
    <script>
    document.getElementById('shareBtn').onclick = function() {
      FB.ui({
        display: 'popup',
        method: 'share',
        href: "{{ Request::url() }}",
      }, function(response){});
    }
    @endif
    </script>
  </div>

  <div class="row">
    <div class="col-md-6 py-3">
      <h2 class="ml-2 mb-3">
        {{ $product->name }}
      </h2>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th>
                Price
              </th>
              <td class="text-danger" style="font-size: 1.5rem;">
                Rs.
                @php echo number_format( $product->selling_price ); @endphp
              </td>
            </tr>
            <tr>
              <th>
                Description
              </th>
              <td class="text-secondary">
                {{ $product->description }}
              </td>
            </tr>
            <tr>
              <th>
                In stock
              </th>
              <td class="">
                <span class="badge badge-pill badge-success p-2">
                  Yes
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap">
    </div>
  </div>
  <div class="p-3">
    <div class="row">
      <div class="col-md-6">
        <h2 class="my-3">
          Order / Inquiry
        </h2>
        @livewire ('website-product-order', ['product' => $product,])
      </div>
    </div>
  </div>
</div>
